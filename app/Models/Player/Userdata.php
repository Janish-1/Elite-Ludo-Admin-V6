<?php

namespace App\Models\Player;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userdata extends Model
{
    use HasFactory;

    protected $fillable = [
        "userid",
        "playerid",
        "username",
        "userphone",
        "password",
        "OTPCode",
        "useremail",
        "photo",
        "refer_code",
        "used_refer_code",
        "totalgem",
        "totalcoin",
        "playcoin",
        "wincoin",
        "device_token",
        "registerDate",
        "refrelCoin",
        "GamePlayed",
        "twoPlayWin",
        "FourPlayWin",
        "twoPlayloss",
        "FourPlayloss",
        "status",
        "banned",
        "accountHolder",
        "accountNumber",
        "ifsc",
        "uniquebankid",
        "in_game_status",
        "uniqueupiid",
        "upi_id",
        "upi_name",
        "acc_holder",
        "tournament_id",
        "table_id",
        "bid_pay_status",
        "kyc_completed",
        "is_bot",
    ];
}
