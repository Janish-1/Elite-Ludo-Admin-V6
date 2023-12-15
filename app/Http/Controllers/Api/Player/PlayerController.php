<?php

namespace App\Http\Controllers\Api\Player;

use App\Http\Controllers\Controller;
use App\Models\Player\Userdata;
use App\Models\Bidvalue\Bid;
use Illuminate\Http\File;
use App\Models\WebSetting\Websetting;
use App\Models\Shopcoin\Shopcoin;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class PlayerController extends Controller
{


    public function CreatePlayer(Request $request)
    {
        $gameConfig = Websetting::first();
        $randomNumber = random_int(100000, 999999);
        $playerid = "LUDO" . random_int(100000, 999999);

        //check google login
        $checkGooglePrevAccount = Userdata::where('useremail', $request->email)->first();
        if ($checkGooglePrevAccount != "") {
            if ($checkGooglePrevAccount['device_token'] != null) {
                $CheckDevice = Userdata::where('device_token', $request->device_token)->first();
                if ($CheckDevice != "") {
                    $CheckBoth = Userdata::where('useremail', $request->email)->where('device_token', $request->device_token)->first();
                    if ($CheckBoth != "") {
                        if ($CheckBoth['banned'] == 0) {
                            $response = ['notice' => 'User Banned'];
                            return response($response, 200);
                        } else {
                            $response = ['notice' => 'User Already Exists !', 'playerid' => $CheckBoth['playerid']];
                            return response($response, 200);
                        }
                    } else {
                        $response = ['notice' => 'User Used Diffrent Device'];
                        return response($response, 200);
                    }
                } else {
                    $response = ['notice' => 'User Used Diffrent Device'];
                    return response($response, 200);
                }
            } else {
                $updatedata = Userdata::where('useremail', $request->email)->update(array(
                    "device_token" => $request->device_token,
                ));
                if ($updatedata) {
                    $response = ['notice' => 'Device ID Update'];
                    return response($response, 200);
                } else {
                    $response = ['notice' => 'Device ID Not Update'];
                    return response($response, 200);
                }
            }
        } else {

            $CheckDevice = Userdata::where('device_token', $request->device_token)->first();
            if ($CheckDevice != "") {
                $response = ['notice' => 'User Used Diffrent Device'];
                return response($response, 200);
            } else {
                $insert = Userdata::insert([
                    'playerid' => $playerid,
                    "username" => $request->first_name,
                    "password" => Hash::make($request->password),
                    "useremail" => $request->email,
                    "refer_code" => $randomNumber,
                    "totalcoin" => $gameConfig->signup_bonus,
                    "wincoin" => "0",
                    "refrelCoin" => "0",
                    "registerDate" => date("l jS F Y h:i:s A"),
                    "device_token" => $request->device_token,
                    "status" => 1,
                    "banned" => 1,
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ]);

                if ($insert) {
                    $data = Userdata::where('useremail', $request->email)->first();
                    $response = ['notice' => 'User Successfully Created !', 'playerid' => $data['playerid']];
                    return response($response, 200);
                } else {
                    return response(array("notice" => "Opps Something Is Wrong !"), 200)->header("Content-Type", "application/json");
                }
            }
        }
    }


    public function PlayerDeatils(Request $request)
    {
        $PlayerCoin = Userdata::where('playerid', $request->playerid)->first();
        $UpdateCoin = $PlayerCoin['totalcoin'] + $PlayerCoin['wincoin']+ $PlayerCoin['refrelCoin'];
        $UpdateData = Userdata::where('playerid', $request->playerid)->update([
            "playcoin" => $UpdateCoin,
        ]);
        if ($UpdateData) {
            $userdata = Userdata::where('playerid', $request->playerid)->first();
        } else {
            $response = ["message" => 'Something Is Wrong'];
            return response($response, 200);
        }

        $bid = Bid::get();
        $shopcoin = Shopcoin::get();
        $gameConfig = Websetting::first();

        $response = ["message" => 'All Details Fetched Successfully', 'playerdata' => $userdata, 'bidvalues' => $bid, 'gameconfig' => $gameConfig, 'shop_coin' => $shopcoin];
        return response($response, 200);
    }

    public function PlayerProfileIMGUpdate(Request $request)
    {

        if ($request->profile_img) {
            $fileName = $request->file("profile_img");
            $path = $fileName->getClientOriginalName();
            $imagePath = $fileName->storeAs("public/Profile", $path, "local");
            $imagePath = str_replace("public/Profile", "", $imagePath);
            $data["profile_img"] = $imagePath;

            $response = Userdata::where('playerid', $request->playerid)->update(array(
                "photo" => $imagePath,
            ));

            if ($response) {
                $response = ['notice' => 'Image Updated'];
                return response($response, 200);
            } else {
                $response = ['notice' => 'Image Not Updated'];
                return response($response, 200);
            }
        } else {
            $response = ['notice' => 'Image Not Received'];
            return response($response, 200);
        }
    }


    //now check mobile regisyter user

    public function MobileCheck(Request $request)
    {
        $checkmobile = Userdata::where('userphone', $request->mobilenumber)->first();
        if ($checkmobile['banned'] == 0) {
            $response = ['message' => 'User Banned'];
            return response($response, 200);
        } else {
            $checkmobile = Userdata::where('userphone', $request->mobilenumber)->first();
            if ($checkmobile != "") {
                $deviceid = Userdata::where('device_token', $request->device_token)->first();
                if ($deviceid != "") {
                    $CheckBoth = Userdata::where('userphone', $request->mobilenumber)->where('device_token', $request->device_token)->first();
                    if ($CheckBoth != "") {
                        $response = ['message' => 'User Already Exists !', 'playerid' => $CheckBoth['playerid']];
                        return response($response, 200);
                    } else {
                        $response = ['message' => 'User Used Diffrent Device'];
                        return response($response, 200);
                    }
                } else {
                    $response = ['message' => 'User Used Diffrent Device'];
                    return response($response, 200);
                }
                $response = ['message' => 'User Already Exist !', 'playerid' => $checkmobile['playerid']];
                return response($response, 200);
            } else {
                $response = ['message' => 'User Not Exist !'];
                return response($response, 200);
            }
        }
    }


    public function MobileRegister(Request $request)
    {
        $gameConfig = Websetting::first();
        $randomNumber = random_int(100000, 999999);
        $playerid = "LUDO" . random_int(1000000, 9999999);

        $CheckDevice = Userdata::where('device_token', $request->device_token)->first();
        if ($CheckDevice != "") {
            $response = ['notice' => 'User Used Diffrent Device'];
            return response($response, 200);
        } else {
            if ($request->refer_code != "") {
                $ReferCode = Userdata::where('refer_code', $request->refer_code)->first();
                if ($ReferCode != "") {
                    $refercoin = $ReferCode["refrelCoin"] + $gameConfig["refer_bonus"];
                    $updatereferuser = Userdata::where('refer_code', $request->refer_code)->update(array(
                        "refrelCoin" => $refercoin,
                    ));

                    if ($updatereferuser) {
                        $insert = Userdata::insert([
                            'playerid' => $playerid,
                            "username" => $request->playername,
                            "password" => Hash::make($request->password),
                            "userphone" => $request->mobilenumber,
                            "refer_code" => $randomNumber,
                            "used_refer_code" =>  $request->refer_code,
                            "totalcoin" => $gameConfig->signup_bonus,
                            "wincoin" => "0",
                            "refrelCoin" => "0",
                            "registerDate" => date("l jS F Y h:i:s A"),
                            "device_token" => $request->device_token,
                            "status" => 1,
                            "banned" => 1,
                        ]);

                        if ($insert) {
                            $response = ['message' => 'User Created Successfully !', 'playerid' => $playerid];
                            return response($response, 200);
                        } else {
                            $response = ['message' => 'Something is wrong'];
                            return response($response, 200);
                        }
                    } else {
                        $response = ['message' => 'Something is wrong'];
                        return response($response, 200);
                    }
                } else {
                    $response = ['message' => 'Invalid Refer Code'];
                    return response($response, 200);
                }
            } else {
                $insert = Userdata::insert([
                    'playerid' => $playerid,
                    "username" => $request->playername,
                    "password" => Hash::make($request->password),
                    "userphone" => $request->mobilenumber,
                    "refer_code" => $randomNumber,
                    "totalcoin" => $gameConfig->signup_bonus,
                    "wincoin" => "0",
                    "refrelCoin" => "0",
                    "registerDate" => date("l jS F Y h:i:s A"),
                    "device_token" => $request->device_token,
                    "status" => 1,
                    "banned" => 1,
                ]);

                if ($insert) {
                    $response = ['message' => 'User Created Successfully !', 'playerid' => $playerid];
                    return response($response, 200);
                } else {
                    $response = ['message' => 'Something is wrong'];
                    return response($response, 200);
                }
            }
        }
    }
}
