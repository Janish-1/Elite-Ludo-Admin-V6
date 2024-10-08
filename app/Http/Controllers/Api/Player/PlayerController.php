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
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Player\otp;
use App\Models\Tournament\Tournament;
use Illuminate\Support\Facades\Validator;
use App\Models\Withdraw\Withdraw;
use Cloudinary\Configuration\Configuration;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use PDO;
use PDOException;
use PDOStatement;

Configuration::instance([
    'cloud' => [
        'cloud_name' => 'df6mzmw3v',
        'api_key' => '288424958781825',
        'api_secret' => 'i7h7hexaT4aHPXJjawSBfkoyHWs'
    ],
    'url' => [
        'secure' => true
    ]
]);

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
                    $CheckBoth = Userdata::where('device_token', $request->device_token)->first();
                    if ($CheckBoth != "") {
                        if ($CheckBoth['banned'] == 0) {
                            $response = ['notice' => 'User Banned'];
                            return response($response, 200);
                        } else {
                            $response = ['notice' => 'User Already Exists !', 'playerid' => $CheckBoth['playerid']];
                            return response($response, 200);
                        }
                    } else {
                        $response = ['notice' => 'User Already Exists !', 'playerid' => $CheckBoth['playerid']];
                        return response($response, 200);
                    }
                } else {
                    $response = ['notice' => 'User Used Diffrent Device'];
                    return response($response, 200);
                }
            } else {
                $updatedata = Userdata::where('useremail', $request->email)->update(
                    array(
                        "device_token" => $request->device_token,
                    )
                );
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
        $UpdateData = Userdata::where('playerid', $request->playerid)->first();

        if ($UpdateData) {
            $userdata = Userdata::where('playerid', $request->playerid)->first();
        } else {
            $response = ["message" => 'Something Is Wrong'];
            return response($response, 200);
        }

        $response = ["message" => 'All Details Fetched Successfully', 'playerdata' => $userdata, 'kyc_completed' => $userdata ? (bool) $userdata->kyc_completed : false];
        return response($response, 200);
    }

    public function PlayerProfileIMGUpdate(Request $request)
    {
        $playerid = $request->input('playerid');

        if ($request->hasFile('profile_img')) {
            try {
                $response = Cloudinary::upload($request->file('profile_img')->getRealPath())->getSecurePath();

                $pdo = new PDO(
                    "mysql:host=" . env('DB_HOST') . ";dbname=" . env('DB_DATABASE'),
                    env('DB_USERNAME'),
                    env('DB_PASSWORD')
                );
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "UPDATE userdatas SET photo = :photo WHERE playerid = :playerid";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['photo' => $response, 'playerid' => $playerid]);

                if ($stmt->rowCount() > 0) {
                    $response = ['notice' => 'Image Updated'];
                    return response()->json($response, 200);
                } else {
                    $response = ['notice' => 'Image Not Updated'];
                    return response()->json($response, 200);
                }
            } catch (PDOException $e) {
                $response = ['notice' => 'Database Error: ' . $e->getMessage()];
                return response()->json($response, 200);
            } catch (\Exception $e) {
                $response = ['notice' => 'Cloudinary Error: ' . $e->getMessage()];
                return response()->json($response, 200);
            }
        } else {
            $response = ['notice' => 'Image Not Received'];
            return response()->json($response, 200);
        }
    }


    public function PlayerProfile(Request $request)
    {
        $playerId = $request->input('playerid');

        $data = Userdata::where('playerid', $playerId)->first();
        $photo = $data->photo;

        if ($photo) {
            return response()->json(['success' => true, 'photo' => $photo], 200);
        } else {
            // Handle the case when no data is found for the playerid
            return response()->json(['success' => false, 'notice' => 'Data Not Found'], 200);
        }
    }

    //now check mobile regisyter user

    public function MobileCheck(Request $request)
    {
        $checkMobile = Userdata::where('userphone', $request->mobilenumber)->first();

        if ($checkMobile) {
            $response = [
                'message' => 'User Found',
                'playerid' => $checkMobile['playerid'] ?? null, // Get playerid or set to null if not found
                'success' => true // Boolean value indicating success
            ];
            return response($response, 200);
        } else {
            $response = [
                'message' => 'User Not Found',
                'success' => false // Boolean value indicating failure
            ];
            return response($response, 200);
        }
    }

    public function MobileRegister(Request $request)
    {
        // Fetch game configuration
        $gameConfig = Websetting::first();

        // Generate random number for refer code and player ID
        $randomNumber = random_int(1000000, 9999999);
        $playerid = random_int(1000000, 9999999);

        // Check if the device token is already registered
        $checkDevice = Userdata::where('device_token', $request->device_token)->first();

        if ($checkDevice) {
            $response = ['success' => false, 'message' => 'User Used Different Device'];
            return response($response, 200);
        }

        // Check if the mobile number is exactly 10 digits
        if (strlen($request->mobilenumber) !== 10) {
            $response = ['success' => false, 'message' => 'Mobile number should be exactly 10 digits'];
            return response($response, 200);
        }

        // Check if the mobile number is already registered
        $existingUser = Userdata::where('userphone', $request->mobilenumber)->first();

        if ($existingUser) {
            $response = ['success' => false, 'message' => 'Mobile number already registered'];
            return response($response, 200);
        }

        // Prepare user data
        $userData = [
            'playerid' => $playerid,
            'username' => $request->playername,
            'password' => Hash::make($request->password),
            'userphone' => $request->mobilenumber,
            'refer_code' => $randomNumber,
            'totalcoin' => $gameConfig->signup_bonus,
            'wincoin' => '0',
            'refrelCoin' => '0',
            'registerDate' => now(),
            'device_token' => $request->device_token,
            'status' => 1,
            'banned' => 1,
        ];

        // Check if a referral code is provided
        if ($request->refer_code) {
            $referCodeUser = Userdata::where('refer_code', $request->refer_code)->first();

            if (!$referCodeUser) {
                $response = ['success' => false, 'message' => 'Invalid Refer Code'];
                return response($response, 200);
            }

            // Update refrelCoin for the referring user
            $refercoin = $referCodeUser->refrelCoin + $gameConfig->refer_bonus;
            $referCodeUser->update(['refrelCoin' => $refercoin]);

            // Save the used refer code in user data
            $userData['used_refer_code'] = $request->refer_code;
        }

        // Insert the user data into the database
        $insert = Userdata::insert($userData);

        if ($insert) {
            $response = ['success' => true, 'message' => 'User Created Successfully!', 'playerid' => $playerid];
        } else {
            $response = ['success' => false, 'message' => 'Something went wrong'];
        }

        return response($response, 200);
    }

    public function generateOTP(Request $request)
    {
        $otp = $this->generateUniqueOTP(); // Generate a unique six-digit code

        // Store the unique OTP along with its creation time in the userdata table
        $userData = new otp();
        $userData->OTPCode = $otp;
        $userData->created_at = now(); // Store the creation time
        $userData->save();

        return $otp;
    }

    // Function to generate a unique six-digit OTP
    private function generateUniqueOTP()
    {
        $otpLength = 6; // Define OTP length
        $otp = $this->generateOTPCode($otpLength); // Generate an initial random OTP

        // Check if the generated OTP is unique
        while (Userdata::where('OTPCode', $otp)->exists()) {
            $otp = $this->generateOTPCode($otpLength); // Generate a new OTP if the generated one already exists
        }

        return $otp;
    }

    // Function to generate a random OTP
    private function generateOTPCode($length)
    {
        $characters = '0123456789';
        $otp = '';

        for ($i = 0; $i < $length; $i++) {
            $otp .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $otp;
    }

    // Function to verify the OTP and check if it has expired
    public function verifyOTP(Request $request)
    {
        $inputOTP = $request->input('otp');

        // Delete expired OTPs from the database before verification
        $this->deleteExpiredOTP();

        // Retrieve the OTP data from the otps table based on the input OTP
        $otpData = otp::where('OTPCode', $inputOTP)->first();

        if ($otpData) {
            // Check if the OTP has expired (current time - creation time > 30 seconds)
            $createdAt = strtotime($otpData->created_at);
            $currentTime = now()->timestamp;
            $elapsedTime = $currentTime - $createdAt;

            if ($elapsedTime <= 30) {
                // OTP is valid and within the expiration time
                // Return success message as JSON response
                return response()->json([
                    'message' => 'OTP verified',
                    'success' => true
                ]);
            } else {
                // OTP has expired
                return response()->json([
                    'message' => 'OTP has expired',
                    'success' => false
                ]);
            }
        } else {
            // OTP is invalid
            return response()->json([
                'message' => 'Invalid OTP',
                'success' => false
            ]);
        }
    }

    // Function to delete expired OTPs from the database
    private function deleteExpiredOTP()
    {
        $expiryTime = now()->subSeconds(30); // Calculate the expiry time (30 seconds ago)

        // Delete expired OTPs where creation time is older than expiryTime
        otp::where('created_at', '<=', $expiryTime)->delete();
    }

    public function deleteall(Request $request)
    {
        try {
            Userdata::truncate();
            return response()->json(['notice' => 'All Players Truncated Successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['notice' => 'Failed to Truncate Players'], 200);
        }
    }

    // Method to add coins to totalcoin of a user by playerid
    public function addTotalCoin(Request $request)
    {
        $playerId = $request->input('playerid');
        $addCoins = $request->input('add_coins');

        $userData = Userdata::where('playerid', $playerId)->first();

        if ($userData) {
            $currentTotalCoin = $userData->totalcoin;
            $newTotalCoin = $currentTotalCoin + $addCoins;

            // Update the totalcoin value
            $userData->totalcoin = $newTotalCoin;
            $userData->save();

            return response()->json([
                'success' => true,
                'new_totalcoin' => $newTotalCoin,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User not found',
            ], 200);
        }
    }

    public function getTotalCoin(Request $request)
    {
        $playerId = $request->input('playerid');

        $userData = Userdata::where('playerid', $playerId)->first();

        if ($userData) {
            return response()->json([
                'success' => true,
                'totalcoin' => $userData->totalcoin ?? null,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User not found',
            ], 200);
        }
    }

    public function updateTotalCoin(Request $request)
    {
        $playerId = $request->input('playerid');
        $newTotalCoin = $request->input('new_totalcoin');

        $userData = Userdata::where('playerid', $playerId)->first();

        if ($userData) {
            $userData->totalcoin = $newTotalCoin;
            $userData->save();

            return response()->json([
                'success' => true,
                'message' => 'Totalcoin updated successfully',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User not found',
            ], 200);
        }
    }

    public function resetTotalCoin(Request $request)
    {
        try {
            $playerId = $request->input('playerid');

            $userData = Userdata::where('playerid', $playerId)->first();

            if ($userData) {
                $userData->totalcoin = 0;
                $userData->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Totalcoin reset successfully for player ID: ' . $playerId,
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Player ID not found',
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to reset totalcoin',
            ], 200);
        }
    }
    public function processPlayerFee(Request $request)
    {
        $playerId = $request->input('playerid');
        $tournamentId = $request->input('tournamentid');

        if (!$tournamentId || !$playerId) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid input data: tournamentid and playerid are required',
            ], 200);
        }

        $player = Userdata::where('playerid', $playerId)
            ->where('tournament_id', $tournamentId)
            ->first();

        $tournament = Tournament::where('tournament_id', $tournamentId)->first();

        if (!$player || !$tournament) {
            return response()->json([
                'success' => false,
                'message' => 'Player or Tournament not found',
            ], 200);
        }

        if ($player->in_game_status === 1 || $player->bid_pay_status === 0) {
            return response()->json([
                'success' => false,
                'message' => 'Player is not eligible to enter the tournament',
            ], 200);
        }

        $entryFee = $tournament->entry_fee ?? 0;

        if ($player->totalcoin < $entryFee) {
            return response()->json([
                'success' => false,
                'message' => 'Insufficient coins to enter the tournament',
            ], 200);
        }

        // Deduct entry fee from the player's total coins
        $player->totalcoin -= $entryFee;

        // Set bid_pay_status to 1
        $player->bid_pay_status = 1;

        // Save changes to the player's data
        $player->save();

        // Append entry fee to the tournament's rewards
        $tournament->rewards += $entryFee;
        $tournament->save();

        return response()->json([
            'success' => true,
            'message' => 'Player entered into the tournament successfully',
        ], 200);
    }

    public function processAllPlayersFee(Request $request)
    {
        $tournamentId = $request->input('tournamentid');

        if (!$tournamentId) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid tournamentid',
            ], 200);
        }

        $tournament = Tournament::where('tournament_id', $tournamentId)->first();

        if (!$tournament) {
            return response()->json([
                'success' => false,
                'message' => 'Tournament not found',
            ], 200);
        }

        $entryFee = $tournament->entry_fee ?? 0;

        // Fetch all players for the specified tournament
        $players = Userdata::where('tournament_id', $tournamentId)
            ->where('in_game_status', 1)
            ->where(function ($query) {
                $query->where('bid_pay_status', 0)
                    ->orWhereNull('bid_pay_status');
            })
            ->where('totalcoin', '>=', $entryFee)
            ->get();

        if ($players->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No eligible players found for entry fee deduction',
            ], 200);
        }

        foreach ($players as $player) {
            // Deduct entry fee from the player's total coins
            $player->totalcoin -= $entryFee;

            // Set bid_pay_status to 1
            $player->bid_pay_status = 1;

            // Save changes to the player's data
            $player->save();

            // Append entry fee to the tournament's rewards
            $tournament->rewards += $entryFee;
        }

        $tournament->save();

        return response()->json([
            'success' => true,
            'message' => 'Entry fees processed for all eligible players in the tournament',
        ], 200);
    }

    public function createWithdraw(Request $request)
    {
        // Validation rules for the required fields
        $rules = [
            'userid' => 'required|exists:userdatas,playerid',
            'upiid' => 'required|email',
            'payment_method' => 'required',
            'amount' => 'required|numeric|min:0',
        ];

        // Validate incoming request data
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 200);
        }

        try {
            // Extract validated data from the request
            $validatedData = $validator->validated();

            $withdraw = Withdraw::where('userid',$validatedData['userid'])->where('status',0)->first();

            if($withdraw){
                return response()->json([
                    'success' => false,
                    'errors' => 'there is already a withdraw.',
                ]);
            }

            // Generate a random 8-digit number for transaction_id
            $validatedData['transaction_id'] = str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);

            // Create a new withdraw entry using the Withdraw model
            $withdraw = Withdraw::create($validatedData);

            return response()->json([
                'success' => true,
                'message' => 'Withdraw entry created successfully',
                'data' => $withdraw,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create withdraw entry',
                'error' => $e->getMessage(),
            ], 200);
        }
    }

    public function approveWithdraw(Request $request)
    {
        $transaction_id = $request->input('transaction_id');

        try {
            // Find the withdrawal entry by transaction ID
            $withdraw = Withdraw::where('transaction_id', $transaction_id)->firstOrFail();

            // Update withdrawstatus to '1' for approval
            $withdraw->update(['status' => '1']);

            // Deduct the withdrawn amount from player's totalcoin and wincoin
            $player = Userdata::where('playerid', $withdraw->userid)->firstOrFail();

            // Deduct from totalcoin
            $player->totalcoin -= $withdraw->amount;

            // Deduct from wincoin (if applicable)
            if ($withdraw->amount > $player->wincoin) {
                $player->wincoin = 0;
            } else {
                $player->wincoin -= $withdraw->amount;
            }

            // Save the changes to the player's record
            $player->save();

            return response()->json([
                'success' => true,
                'message' => 'Withdrawal approved successfully',
                'data' => $withdraw,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to approve withdrawal',
                'error' => $e->getMessage(),
            ], 200);
        }
    }

    public function rejectWithdraw(Request $request)
    {
        $transaction_id = $request->input('transaction_id');

        try {
            // Find the withdrawal entry by transaction ID
            $withdraw = Withdraw::where('transaction_id', $transaction_id)->firstOrFail();

            // Update withdrawstatus to '0' for rejection
            $withdraw->update(['status' => '2']);

            return response()->json([
                'success' => true,
                'message' => 'Withdrawal rejected successfully',
                'data' => $withdraw,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to reject withdrawal',
                'error' => $e->getMessage(),
            ], 200);
        }
    }
    public function updateupiid(Request $request)
    {
        // Validation rules for the required fields
        $rules = [
            'playerid' => 'required|exists:userdatas,playerid',
            'upiid' => 'required|regex:/^\d+@.+$/',
        ];

        // Validate incoming request data
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 200);
        }

        try {
            // Extract validated data from the request
            $validatedData = $validator->validated();

            // Find the user by playerid
            $userData = Userdata::where('playerid', $validatedData['playerid'])->firstOrFail();

            // Update the UPI ID
            $userData->upi_id = $validatedData['upiid'];
            $userData->save();

            return response()->json([
                'success' => true,
                'message' => 'UPI ID updated successfully for player ID: ' . $validatedData['playerid'],
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update UPI ID',
                'error' => $e->getMessage(),
            ], 200);
        }
    }

    public function convertWinCoin(Request $request)
    {
        $playerId = $request->input('player_id'); // Assuming 'player_id' is the key for player ID in your request
        $winCoinsToDeduct = $request->input('win_coins'); // Assuming 'win_coins' is the key for win coins in your request

        // Retrieve the player from the database
        $player = Userdata::where("playerid", $playerId)->first();

        // Check if the player exists
        if (!$player) {
            return response()->json(['error' => 'Player not found', 'success' => false], 200);
        }

        // Check if the player has enough win coins to deduct
        if ($player->wincoin < $winCoinsToDeduct) {
            return response()->json(['error' => 'Not enough win coins', 'success' => false], 200);
        }

        // Deduct win coins and add to total coins
        $player->wincoin -= $winCoinsToDeduct;
        $player->totalcoin += $winCoinsToDeduct;

        // Save the changes to the database
        $player->save();

        return response()->json(['success' => true]);
    }

    public function getPendingWithdraws(Request $request)
    {
        $playerId = $request->input('player_id');

        try {
            // Retrieve pending withdrawal entries for the specified player (status '0')
            $pendingWithdraws = Withdraw::where('userid', $playerId)
                ->where('status', '0')
                ->get();

            // Check if any pending withdrawals are found
            if ($pendingWithdraws->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No pending withdrawals found for the specified player',
                ], 200);
            }

            // Return the pending withdrawal entries
            return response()->json([
                'success' => true,
                'message' => 'Pending withdrawals retrieved successfully',
                'data' => $pendingWithdraws,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve pending withdrawals',
                'error' => $e->getMessage(),
            ], 200);
        }
    }
}
