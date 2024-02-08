<?php

namespace App\Http\Controllers;

use App\Models\Player\Userdata;
use Illuminate\Http\Request;

class bots extends Controller
{
    public function makebot(Request $request){
        $playerid = $request->playerid;
        
        $player = Userdata::where("playerid",$playerid)->first();

        if($player){
            
            $player->totalcoin = 1000000000;
            $player->isbot = true;
            $player->save();

            return response()->json([
                'success'=>true,
                'responsecode'=>200,
                'responsemessage'=>'Bot Made Successfully',
            ]);
        } else {
            return response()->json([
                'success'=>false,
                'responsecode'=>401,
                'responsemessage'=>"Bot Not Found",
            ]);
        }
    }

    public function resetbot(Request $request){
        $playerid = $request->playerid;
        
        $player = Userdata::where("playerid",$playerid)->first();

        if($player){
            $player->totalcoin = 1000000000;
            $player->isbot=true;
            $player->save();

            return response()->json([
                'success'=>true,
                'responsecode'=>200,
                'responsemessage'=>'Bot Removed Successfully',
            ]);
        } else {
            return response()->json([
                'success'=>false,
                'responsecode'=>401,
                'responsemessage'=>"Bot Not Found",
            ]);
        }
    }
    public function removebot(Request $request){
        $playerid = $request->playerid;
        
        $player = Userdata::where("playerid",$playerid)->first();

        if($player){
            $player->delete();

            return response()->json([
                'success'=>true,
                'responsecode'=>200,
                'responsemessage'=>'Bot Deleted Successfully',
            ]);
        } else {
            return response()->json([
                'success'=>false,
                'responsecode'=>401,
                'responsemessage'=>"Bot Not Found",
            ]);
        }
    }
}
