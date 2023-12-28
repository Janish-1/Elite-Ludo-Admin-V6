<?php

use Illuminate\Http\Request;
use App\Http\Controllers\RestApi\PaymentGateway\Razorpay\RazorpayController;
use App\Http\Controllers\PaymentGateway\Razorpay\GemRazorpay;
use App\Http\Controllers\Api\Player\PlayerController;
use App\Http\Controllers\Tournament\TournamentController;
use App\Http\Controllers\Api\Player\GameManagerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//player data routing
Route::post('/register',[PlayerController::class,'CreatePlayer']);

Route::post('/mobile/checkuser',[PlayerController::class,'MobileCheck']);

Route::post('/mobile/registration',[PlayerController::class,'MobileRegister']);

Route::post('/verify/user',[PlayerController::class,'VerifyUser']);

Route::post('/login',[PlayerController::class,'loginPlayer']);

Route::post('/player/details',[PlayerController::class,'PlayerDeatils']);

Route::post('/player/profile/image/update',[PlayerController::class,'PlayerProfileIMGUpdate']);

Route::post('/join/game',[GameManagerController::class,'JoinGame']);

Route::post('/gameplay/status',[GameManagerController::class,'GameStatus']);

Route::post('/player/playerhistory',[GameManagerController::class,'AddGameHistory']);

Route::post('/amount/withdraw',[GameManagerController::class,'WithdrawRequest']);

Route::post('/update/bank/account',[GameManagerController::class,'UpdateBankAccount']);

Route::post('/search/player',[GameManagerController::class,'SearchPlayer']);

Route::post('/payment/history',[GameManagerController::class,'PaymentHistory']);

Route::get('/player/leaderboard',[GameManagerController::class,'Leaderboard']);

Route::post('/refer/player',[GameManagerController::class,'ReferCode']);

Route::get('/check/app/version',[GameManagerController::class,'AppVersion']);

Route::post('/tournament/details',[TournamentController::class,'findTournamentDetails']);

Route::post('/tournament/enroll',[TournamentController::class,'enrollPlayerInTable']);

Route::get('/tournament/onlytournament',[TournamentController::class,'findTournamentonly']);

Route::get('/tournament/alltournaments',[TournamentController::class,'findallTournaments']);

Route::delete('/tournament/delete', [TournamentController::class, 'deleteTournamentDetails']);

Route::delete('/deleteall', [PlayerController::class,'deleteall'])->name('delete.all.players');

Route::post('/tournament/removeplayer', [TournamentController::class, 'removePlayerFromTournament']);

Route::get('/otp',[PlayerController::class, 'generateOTP']);

Route::post('/verifyotp',[PlayerController::class, 'verifyOTP']);

Route::post('/tournament/playerwin', [TournamentController::class, 'playerwin']);

Route::post('/tournament/nextround',[TournamentController::class, 'nextround']);

Route::post('/tournament/create/new', [TournamentController::class, 'CreateTournamentWithTables']);

Route::get('/ads', [AdsController::class,'index']);

Route::post('/ads/updateimage/a', [AdsController::class, 'UpdateAda'])->name('update.Ad.imagea');

Route::post('/ads/updateimage/b', [AdsController::class, 'UpdateAdb'])->name('update.Ad.imageb');

Route::get('/getads',[AdsController::class,'getAllAds']);

Route::post('/tournament/winner',[TournamentController::class, 'tournamentwinner']);

// This route is for payment initiate page

Route::get('/razorpay/payment',[RazorpayController::class,'Initiate']);
Route::post('/razorpay/payment/complete',[RazorpayController::class,'Complete']);


