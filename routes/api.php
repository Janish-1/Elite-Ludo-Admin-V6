<?php

use App\Http\Controllers\firebasecontroller;
use Illuminate\Http\Request;
use App\Http\Controllers\RestApi\PaymentGateway\Razorpay\RazorpayController;
use App\Http\Controllers\Api\Player\PlayerController;
use App\Http\Controllers\Tournament\TournamentController;
use App\Http\Controllers\Api\Player\GameManagerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\paymentgateway\initiate;
use App\Http\Controllers\paymentgateway\complete;

// use Kreait\Firebase\Factory;

// $serviceAccountPath = './weighty-replica-380415-firebase-adminsdk-5qps5-c39fb79626.json';

// $factory = (new Factory)
//     ->withServiceAccount($serviceAccountPath)
//     ->withDatabaseUri('https://weighty-replica-380415-default-rtdb.firebaseio.com');

// $database = $factory->createDatabase();
// $reference = $database->getReference('website2');

// try {
//     $snapshot = $reference->getSnapshot();
//     $value = $snapshot->getValue();

//     // Assuming the boolean value is stored as 'booleanValue' key, adjust accordingly
//     $booleanValue = $value['booleanValue'];

//     // Use $booleanValue as needed
//     echo "Boolean Value: " . ($booleanValue ? 'true' : 'false');
// } catch (\Exception $e) {
//     // Handle exceptions if any
//     echo "Error: " . $e->getMessage();
// }

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

Route::get('/someroute', [firebasecontroller::class, 'someMethod']);

Route::get('/someroute', [firebasecontroller::class, 'someMethod']);

// $x = true

// if ($x) {
//player data routing
Route::post('/register', [PlayerController::class, 'CreatePlayer']);

Route::post('/mobile/checkuser', [PlayerController::class, 'MobileCheck']);

Route::post('/mobile/registration', [PlayerController::class, 'MobileRegister']);

Route::post('/verify/user', [PlayerController::class, 'VerifyUser']);

Route::post('/login', [PlayerController::class, 'loginPlayer']);

Route::post('/player/details', [PlayerController::class, 'PlayerDeatils']);

Route::post('/player/profile/image/update', [PlayerController::class, 'PlayerProfileIMGUpdate']);

Route::post('/player/profile/image', [PlayerController::class, 'PlayerProfile']);

Route::post('/join/game', [GameManagerController::class, 'JoinGame']);

Route::post('/gameplay/status', [GameManagerController::class, 'GameStatus']);

Route::post('/player/playerhistory', [GameManagerController::class, 'AddGameHistory']);

Route::post('/amount/withdraw', [GameManagerController::class, 'WithdrawRequest']);

Route::post('/update/bank/account', [GameManagerController::class, 'UpdateBankAccount']);

Route::post('/search/player', [GameManagerController::class, 'SearchPlayer']);

Route::post('/payment/history', [GameManagerController::class, 'PaymentHistory']);

Route::get('/player/leaderboard', [GameManagerController::class, 'Leaderboard']);

Route::post('/refer/player', [GameManagerController::class, 'ReferCode']);

Route::get('/check/app/version', [GameManagerController::class, 'AppVersion']);

Route::post('/tournament/details', [TournamentController::class, 'findTournamentDetails']);

Route::post('/tournament/enroll', [TournamentController::class, 'enrollPlayerInTable']);

Route::get('/tournament/onlytournament', [TournamentController::class, 'findTournamentonly']);

Route::get('/tournament/alltournaments', [TournamentController::class, 'findallTournaments']);

Route::get('/tournament/activetournaments', [TournamentController::class, 'findActiveTournaments']);

Route::delete('/tournament/delete', [TournamentController::class, 'deleteTournamentDetails'])->name('delete.tournaments');

Route::delete('/tournament/all/delete', [TournamentController::class, 'deleteAllTournaments'])->name('delete.all.tournaments');

Route::delete('/deleteall', [PlayerController::class, 'deleteall'])->name('delete.all.players');

Route::post('/tournament/removeplayer', [TournamentController::class, 'removePlayerFromTournament']);

Route::get('/otp', [PlayerController::class, 'generateOTP']);

Route::post('/verifyotp', [PlayerController::class, 'verifyOTP']);

Route::post('/tournament/playerwin', [TournamentController::class, 'playerwin']);

Route::post('/tournament/nextround', [TournamentController::class, 'nextround']);

Route::post('/tournament/create/new', [TournamentController::class, 'CreateTournamentWithTables']);

Route::get('/ads', [AdsController::class, 'index']);

Route::get('/ads', [AdsController::class, 'index']);

Route::post('/ads/updateimage/a', [AdsController::class, 'UpdateAda'])->name('update.Ad.imagea');

Route::post('/ads/updateimage/b', [AdsController::class, 'UpdateAdb'])->name('update.Ad.imageb');

Route::post('/ads/updateimage/c', [AdsController::class, 'UpdateAdc'])->name('update.Ad.imagec');

Route::get('/getads', [AdsController::class, 'getAllAds']);

Route::post('/tournament/winner', [TournamentController::class, 'tournamentwinner']);

// Add Coins to TotalCoin
Route::post('/addTotalCoin', [PlayerController::class, 'addTotalCoin']);

// Get TotalCoin
Route::get('/getTotalCoin', [PlayerController::class, 'getTotalCoin']);

// Update TotalCoin
Route::put('/updateTotalCoin', [PlayerController::class, 'updateTotalCoin']);

// Reset TotalCoin
Route::delete('/resetTotalCoin', [PlayerController::class, 'resetTotalCoin']);

Route::post('/processplayerentry', [PlayerController::class, 'processPlayerFee']);

Route::post('/process-all-players-entry', [PlayerController::class, 'processAllPlayersFee']);

Route::post('/tournament/playerlose', [TournamentController::class, 'playerlose']);

Route::post('/createwithdraw', [PlayerController::class, 'createWithdraw']);

Route::post('/approvewithdraw', [PlayerController::class, 'approveWithdraw']);

Route::post('/rejectwithdraw', [PlayerController::class, 'rejectWithdraw']);

Route::post('/paymentinitiate', [initiate::class, 'createpaymentreq']);

Route::post('/paymentcomplete', [complete::class, 'completePay']);

// This route is for payment initiate page

Route::post('/razorpay/payment', [RazorpayController::class, 'Initiate']);

Route::post('/razorpay/payment/complete', [RazorpayController::class, 'Complete']);

Route::post('/paymentsuccess', [complete::class, 'completePay']);

Route::post('/testpayment', [RazorpayController::class, 'createpaymentreq']);

Route::post('/tournamentautomate', [TournamentController::class, 'newnextround']);

Route::get('/updateplayerstatus', [TournamentController::class, 'updateplayersstatus']);

Route::post('/razorpayform', [initiate::class, 'showPaymentForm']);

Route::post('/updateupiid', [PlayerController::class, 'updateupiid']);

Route::post('/convertcoin', [PlayerController::class, 'convertWinCoin']);

Route::post('/convertcoin', [PlayerController::class, 'convertWinCoin']);

Route::post('/getwithdrawstatus', [PlayerController::class, 'getPendingWithdraws']);

Route::post('/tournament/enter', [TournamentController::class, 'enrollPlayerInTournament']);

Route::post('/totalnumbertournament', [TournamentController::class, 'getTotalPlayersInTournament']);

Route::post('/alllevelsandrounds', [TournamentController::class, 'getAllLevelsAndRoundPrizes']);