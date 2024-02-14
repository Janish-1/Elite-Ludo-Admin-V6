<?php

namespace App\Http\Controllers\Tournament;

use App\Http\Controllers\Controller;
use App\Models\Tournament\Tournament;
use App\Models\Tournament\TournamentTablemulti; // Import the TournamentTable model
use App\Models\Player\Userdata;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;
use TournamentTable;

class TournamentController extends Controller
{
    // Define the table name if it's different from the plural of the class name
    protected $table = 'tournaments';

    // Define the primary key column name if it's different from the default 'id'
    protected $primaryKey = 'id';

    // Specify that 'id' is auto-incrementing integer type
    public $incrementing = true;

    public function index()
    {
        try {
            $tournaments = Tournament::latest()->paginate(10);

            foreach ($tournaments as $tournament) {
                $tournamentId = $tournament->tournament_id;
                $tables = TournamentTablemulti::where('tournament_id', $tournamentId)->get();

                // Convert time_start to DateTime object for accurate comparison
                $startTime = new \DateTime($tournament->time_start);
                $currentTime = now();

                if ($startTime < $currentTime && $tournament->t_status != 'completed') {
                    Tournament::where('tournament_id', $tournamentId)->update(['t_status' => 'ongoing']);
                }

                // Assign tables to the specific tournament
                $tournament->tables = $tables;
            }

            $ongoingtournaments = Tournament::where('t_status', 'ongoing')->latest()->paginate(10);

            foreach ($ongoingtournaments as $tournament) {
                $tournamentId = $tournament->tournament_id;
                $tables = TournamentTablemulti::where('tournament_id', $tournamentId)->get();

                // Assign tables to the specific tournament
                $tournament->tables = $tables;
            }

            return view("admin.Tournament.Tournament", compact('tournaments', 'ongoingtournaments'));
        } catch (\Exception $e) {

            // Handle the exception (e.g., log the error, display an error message)
            Log::error("Error occurred: " . $e->getMessage());
            return back()->withError($e->getMessage())->withErrors($e->getMessage());
        }
    }

    public function index1()
    {
        try {
            $completedTournaments = Tournament::where('t_status', 'completed')->latest()->paginate(10);

            foreach ($completedTournaments as $completedTournament) {
                $tournamentId = $completedTournament->tournament_id;
                $completedTables = TournamentTablemulti::where('tournament_id', $tournamentId)->get();

                // Assign tables to the specific completed tournament
                $completedTournament->tables = $completedTables;
            }

            return view("tournamentcomp", compact('completedTournaments'));
        } catch (\Exception $e) {

            // Handle the exception (e.g., log the error, display an error message)
            Log::error("Error occurred: " . $e->getMessage());
            return back()->withError($e->getMessage())->withErrors($e->getMessage());
        }
    }

    public function AddTournament()
    {
        return view("admin.Tournament.AddTournament");
    }

    public function CreateTournamentWithTables(Request $request)
    {
        $tournamentData = $request->all();
        $numTables = $tournamentData['nooftables'];
        $gameType = $tournamentData['player_type'];
        $prizePool = $tournamentData['prize_pool'];

        // Calculate tournament details
        if ($gameType == '1v1') {
            // If the number of tables is a power of 2, calculate the rounds accordingly
            $totalRounds = log($numTables, 2) + 1;
        }
        if ($gameType == '1v3') {
            // If the number of tables is a power of 2, calculate the rounds accordingly
            $totalRounds = log($numTables, 4) + 1;
        }

        $perRoundAmount = $prizePool / $totalRounds;
        $roundPrize = $perRoundAmount / $numTables;

        // Calculate minimum bid value
        $totalPlayersToEnroll = $numTables * (($gameType == '1v1') ? 2 : 4);
        $minimumBidValue = (($prizePool + (0.2 * $prizePool)) / $totalPlayersToEnroll);

        // Check if entry_fee is greater than or equal to minimum_bid_value
        if ($tournamentData['entry_fee'] >= $minimumBidValue) {
            // Generate a unique random tournament ID with up to 5 characters
            $tournamentId = Str::random(15);

            $tournament = Tournament::create(array_merge($tournamentData, [
                'tournament_id' => $tournamentId,
                't_status' => 'ongoing',
                'perroundamount' => $perRoundAmount,
                'roundprize' => $roundPrize,
            ]));

            if ($tournament) {
                for ($i = 1; $i <= $tournament->nooftables; $i++) {
                    // Create tables in TournamentTablemulti
                    $status = ($gameType == '1v1') ? '0/2' : '0/4';

                    TournamentTablemulti::create([
                        'tournament_id' => $tournamentId,
                        'table_id' => $i,
                        'game_name' => $tournament->tournament_name . ' ' . $i,
                        'player_type' => $gameType,
                        'status' => $status,
                    ]);
                }

                return redirect('admin/tournament')->with('success', 'Tournament and tables created successfully.');
            } else {
                return back()->withErrors(['Failed to create Tournament.']);
            }
        } else {
            return back()->withErrors(['Entry fee must be greater than or equal to the minimum bid value.']);
        }
    }

    public function findAllTournaments(Request $request)
    {
        $tournaments = Tournament::all();

        return response()->json([
            'tournaments' => $tournaments,
        ], 200);
    }

    public function findActiveTournaments(Request $request)
    {
        // Assuming 't_status' represents the column for the status of the tournament
        $activeTournaments = Tournament::where('t_status', '!=', 'completed')->get();

        return response()->json([
            'active_tournaments' => $activeTournaments,
        ], 200);
    }

    public function findTournamentDetails(Request $request)
    {
        $tournamentId = $request->input('tournament_id');

        $tournament = Tournament::where('tournament_id', $tournamentId)->first();
        $games = [];

        if ($tournament) {
            $games = TournamentTablemulti::where('tournament_id', $tournamentId)->get();

            if ($games->isEmpty()) {
                return response()->json(['error' => 'No tables found for the tournament.'], 200);
            }
            if ($games->isNotEmpty()) {
                return response()->json([
                    'tournament' => $tournament,
                    'games' => $games
                ], 200);
            }
        } else {
            return response()->json(['error' => 'Tournament not found.'], 200);
        }
    }

    public function findTournamentonly(Request $request)
    {
        $tournamentId = $request->input('tournament_id');

        $tournament = Tournament::where('tournament_id', $tournamentId)->first();

        if ($tournament) {
            return response()->json([
                'tournament' => $tournament,
            ], 200);
        } else {
            return response()->json(['error' => 'Tournament not found.'], 200);
        }
    }

    public function enrollPlayerInTournament(Request $request)
    {
        $tournamentId = $request->input('tournament_id');
        $playerId = $request->input('player_id');

        if (!$playerId || !$tournamentId) {
            return response()->json(['error' => 'Player ID or tournament ID is missing.'], 200);
        }

        $data1 = Tournament::where('tournament_id', $tournamentId)->first();
        $reqmoney = $data1->entry_fee;

        $data2 = Userdata::where('playerid', $playerId)->first();
        $playermoney = $data2->totalcoin;

        if ($reqmoney > $playermoney) {
            return response()->json(['error' => 'Not Enough Coins'], 200);
        }

        $data2->totalcoin -= $reqmoney;
        $data2->save();

        $playerInGame = UserData::where('playerid', $playerId)
            ->where('in_game_status', true)
            ->exists();

        if ($playerInGame) {
            return response()->json(['error' => 'Player is already engaged in a game.'], 200);
        }

        $tournament = Tournament::where('tournament_id', $tournamentId)->first();

        if (!$tournament) {
            return response()->json(['error' => 'Tournament not found.'], 200);
        }

        $userData = UserData::updateOrCreate(
            ['playerid' => $playerId],
            [
                'in_game_status' => true,
                'tournament_id' => $tournamentId,
            ]
        );

        return response()->json(['success' => true, 'responsemessage' => 'Player enrolled in the tournament successfully.'], 200);
    }


    public function enrollPlayerInTable(Request $request)
    {
        $tableId = $request->input('table_id');
        $playerId = $request->input('player_id');

        // Check if the player ID and table ID are provided
        if (!$playerId || !$tableId) {
            return response()->json(['error' => 'Player ID or table ID is missing.'], 200);
        }

        $userData = UserData::where('playerid', $playerId)->first();

        // Check if userdata and tournament ID are available
        if (!$userData || !$userData->tournament_id) {
            return response()->json(['error' => 'Tournament information not found for the player.'], 200);
        }

        $tableModel = null;

        $playerInGame = UserData::where('playerid', $playerId)
            ->where('table_id', true)
            ->exists();

        if ($playerInGame) {
            return response()->json(['error' => 'Player is already engaged in a game.'], 200);
        }

        // Retrieve the tournament instance by ID
        $tournament = Tournament::where('tournament_id', $userData->tournament_id)->first();

        if (!$tournament) {
            return response()->json(['error' => 'Tournament not found.'], 200);
        }

        if ($tournament->player_type === '1v1') {
            $tableModel = TournamentTablemulti::class;
            // Retrieve the table instance by tournament and table IDs
            $table = $tableModel::where('tournament_id', $userData->tournament_id)
                ->where('table_id', $tableId)
                ->first();

            if (!$table) {
                return response()->json(['error' => 'Table not found for the tournament.'], 200);
            }

            // Check available slots and enroll the player accordingly
            if (!$table->player_id1) {
                $table->player_id1 = $playerId;
                $table->status = ($table->player_id2) ? '2/2' : '1/2';
            } elseif (!$table->player_id2) {
                $table->player_id2 = $playerId;
                $table->status = '2/2';
            } else {
                return response()->json(['message' => 'Table is full.'], 200);
            }

            // Find the user data or create a new record if it doesn't exist
            $userData = UserData::updateOrCreate(
                ['playerid' => $playerId],
                [
                    'table_id' => $tableId,
                ]
            );

            // Increment the games_played field by 1
            $userData->increment('GamePlayed');

            // Save changes to the table instance
            $table->save();
        } elseif ($tournament->player_type === '1v3') {
            $tableModel = TournamentTablemulti::class;
            // Retrieve the table instance by tournament and table IDs
            $table = $tableModel::where('tournament_id', $userData->tournament_id)
                ->where('table_id', $tableId)
                ->first();

            if (!$table) {
                return response()->json(['error' => 'Table not found for the tournament.'], 200);
            }

            // Check available slots and enroll the player accordingly
            if (!$table->player_id1) {
                $table->player_id1 = $playerId;
                $table->status = ($table->player_id4) ? '4/4' : (($table->player_id3) ? '3/4' : (($table->player_id2) ? '2/4' : '1/4'));
            } elseif (!$table->player_id2) {
                $table->player_id2 = $playerId;
                $table->status = ($table->player_id4) ? '4/4' : (($table->player_id3) ? '3/4' : '2/4');
            } elseif (!$table->player_id3) {
                $table->player_id3 = $playerId;
                $table->status = ($table->player_id4) ? '4/4' : '3/4';
            } elseif (!$table->player_id4) {
                $table->player_id4 = $playerId;
                $table->status = '4/4';
            } else {
                return response()->json(['message' => 'Table is full.'], 200);
            }

            // Update user's status to indicate engagement in a game and set tournament_id and table_id
            UserData::updateOrCreate(
                ['playerid' => $playerId],
                [
                    'table_id' => $tableId,
                ]
            );

            // Save changes to the table instance
            $table->save();
        } else {
            return response()->json(['error' => 'Invalid game type for the tournament.'], 200);
        }

        return response()->json(['success' => 'Player enrolled in table successfully.'], 200);
    }

    public function deleteTournamentDetails(Request $request)
    {
        $tournamentId = $request->input('tournament_id');

        $tournament = Tournament::where('tournament_id', $tournamentId)->first();

        if ($tournament) {
            TournamentTablemulti::where('tournament_id', $tournamentId)->delete();

            // Delete tournament
            $tournament->delete();

            // Redirect to the specified URL after successful deletion
            return redirect('admin/tournament')->with('success', 'Tournament and associated tables deleted successfully.');
        } else {
            return response()->json(['error' => 'Tournament not found.'], 200);
        }
    }

    public function deleteAllTournaments()
    {
        // Get all tournaments
        $tournaments = Tournament::all();

        if ($tournaments->isNotEmpty()) {
            foreach ($tournaments as $tournament) {
                $tournamentId = $tournament->tournament_id;

                TournamentTablemulti::where('tournament_id', $tournamentId)->delete();

                // Delete the tournament itself
                $tournament->delete();
            }

            // Redirect to the specified URL after successful deletion
            return redirect('admin/tournament')->with('success', 'All tournaments and associated tables deleted successfully.');
        } else {
            return redirect('admin/tournament')->with('error', 'No tournaments found.');
        }
    }

    public function removePlayerFromTournament(Request $request)
    {
        $playerId = $request->input('player_id');

        // Check if the player ID is provided
        if (!$playerId) {
            return Response::json(['error' => 'Player ID is missing.'], 200);
        }

        $playerFoundDetails = [];

        // Find player in TournamentTablemulti
        $playerInTournamentTableMulti = TournamentTablemulti::where('player_id1', $playerId)
            ->orWhere('player_id2', $playerId)
            ->orWhere('player_id3', $playerId)
            ->orWhere('player_id4', $playerId)
            ->get();

        if ($playerInTournamentTableMulti->isNotEmpty()) {
            $playerFoundDetails = $playerInTournamentTableMulti->toArray();
            $this->removePlayerFromTable($playerInTournamentTableMulti, $playerId);
        }

        // You can then output the data in the response
        $responseData = [
            'player_id' => $playerId,
            'player_found_details' => $playerFoundDetails,
        ];

        // Update user's status to indicate engagement in a game and set tournament_id and table_id
        UserData::updateOrCreate(
            ['playerid' => $playerId],
            [
                'in_game_status' => false,
                'tournament_id' => null,
                'table_id' => null,
                'bid_pay_status' => false,
            ]
        );

        return Response::json(['data' => $responseData], 200);
    }

    // Function to remove player from a specific table and update status
    private function removePlayerFromTable($tableData, $playerId)
    {
        foreach ($tableData as $tableRow) {
            $currentStatus = $tableRow->status;
            $statusArray = explode('/', $currentStatus);

            if (count($statusArray) === 2 && is_numeric($statusArray[0])) {
                $statusArray[0] = max(0, intval($statusArray[0]) - 1); // Decrement the first value by 1
                $newStatus = implode('/', $statusArray);
                $tableRow->status = $newStatus;
            }

            foreach ($tableRow->getAttributes() as $columnName => $columnValue) {
                if (strpos($columnName, 'player_id') !== false && $columnValue == $playerId) {
                    $tableRow->$columnName = null;
                }
            }
            // Update the status column
            $tableRow->save();
        }
    }

    public function playerwin(Request $request)
    {
        $playerId = $request->input('player_id');

        // Check if the player ID is provided
        if (!$playerId) {
            return Response::json(['error' => 'Player ID is missing.'], 200);
        }

        // Find player in TournamentTablemulti
        $playerInTournamentTableMulti = TournamentTablemulti::where('player_id1', $playerId)
            ->orWhere('player_id2', $playerId)
            ->orWhere('player_id3', $playerId)
            ->orWhere('player_id4', $playerId)
            ->get();

        if ($playerInTournamentTableMulti->isNotEmpty()) {
            foreach ($playerInTournamentTableMulti as $tournamentMulti) {
                $tournamentIdMulti = $tournamentMulti->tournament_id;
                $tableIdMulti = $tournamentMulti->table_id;

                // Remove player from the table
                $this->removePlayerFromTable([$tournamentMulti], $playerId);

                // Update player in UserData table without changing bid_pay_status
                UserData::updateOrCreate(
                    ['playerid' => $playerId],
                    [
                        'table_id' => null,
                    ]
                );

                // Update the winner in TournamentTablemulti
                TournamentTablemulti::where('tournament_id', $tournamentIdMulti)
                    ->where('table_id', $tableIdMulti)
                    ->update(['winner' => $playerId]);

                // Get the roundprize for the tournament
                $roundPrize = Tournament::where("tournament_id", $tournamentIdMulti)->value('roundprize');

                // Update player's wincoin by the roundprize amount
                UserData::where('playerid', $playerId)->increment('wincoin', $roundPrize);
            }
        }

        // You can then output the data in the response
        $responseData = [
            'player_id' => $playerId,
            'Added_to_Winner' => true,
        ];

        return Response::json($responseData);
    }

    public function nextround(Request $request)
    {
        $tournamentId = $request->input('tournament_id');
        $ntables = $request->input('no_of_tables');

        if (!$tournamentId) {
            return response()->json(['error' => 'No Tournament ID Found'], 200);
        }

        $typeoftournament = Tournament::where('tournament_id', $tournamentId)->get();

        if ($typeoftournament->isEmpty()) {
            return response()->json(['error' => 'Tournament not found'], 200);
        }

        $tournament = $typeoftournament->first();
        $tournament_name = $tournament['tournament_name'];
        $type = $tournament['player_type'];

        $winnersData = TournamentTablemulti::where('tournament_id', $tournamentId)
            ->whereNotNull('winner') // Filter where winner is not null
            ->get(['winner']);

        if ($winnersData->isEmpty()) {
            return response()->json(['error' => 'No winners found for 1v1 tournament'], 200);
        }

        // Delete existing tables related to the tournament ID
        TournamentTablemulti::where('tournament_id', $tournamentId)->delete();

        // Create empty tables for the next round
        $this->createTablesForNextRound($tournamentId, $tournament_name, $ntables, $type);

        return response()->json([
            "message" => "Successfully Created the Next Round Data Table",
            "success" => true,
        ]);
    }

    private function createTablesForNextRound($tournamentId, $tournament_name, $ntables, $type)
    {
        for ($i = 0; $i < $ntables; $i++) {
            TournamentTablemulti::create([
                'tournament_id' => $tournamentId,
                'table_id' => $i + 1,
                'game_name' => $tournament_name . ' ' . ($i + 1),
                'player_type' => $type,
            ]);
        }
    }

    public function tournamentwinner(Request $request)
    {
        $tournamentId = $request->input('tournament_id');
        $playerId = $request->input('playerid');

        // Find the tournament winner
        $tournament = Tournament::where('tournament_id', $tournamentId)->first();

        if ($tournament) {
            $type = $tournament->player_type;

            // Update the player's totalcoin by adding the reward
            $player = Userdata::where('playerid', $playerId)->first();
            if ($player) {

                TournamentTablemulti::where('tournament_id', $tournamentId)->delete();

                $player->save();

                // Reset tournament status and winner
                $tournament->t_status = 'completed';
                $tournament->winner = $playerId;
                $tournament->save();

                if ($type === '1v1') {
                    // Find or create a record for the player and increment twoPlayWin by 1
                    $userData = Userdata::updateOrCreate(
                        ['playerid' => $playerId],
                        []
                    );

                    // Increment the twoPlayWin field by 1
                    $userData->increment('twoPlayWin');
                }

                if ($type === '1v3') {
                    // Find or create a record for the player and increment twoPlayWin by 1
                    $userData = Userdata::updateOrCreate(
                        ['playerid' => $playerId],
                        []
                    );

                    // Increment the twoPlayWin field by 1
                    $userData->increment('FourPlayWin');
                }

                // Update user's status to indicate engagement in a game and set tournament_id and table_id
                UserData::updateOrCreate(
                    ['playerid' => $playerId],
                    [
                        'in_game_status' => false,
                        'tournament_id' => null,
                        'table_id' => null,
                        'bid_pay_status' => false,
                    ]
                );

                return response()->json([
                    'success' => true,
                    'message' => 'Rewards transferred to the tournament winner successfully',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Player not found',
                ], 200);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Tournament or winner not found or winner does not match',
            ], 200);
        }
    }

    public function playerlose(Request $request)
    {
        $playerId = $request->input('player_id');

        // Check if the player ID is provided
        if (!$playerId) {
            return Response::json(['error' => 'Player ID is missing.'], 200);
        }

        $playerFoundDetails = [];

        // Find player in TournamentTablemulti
        $playerInTournamentTableMulti = TournamentTablemulti::where('player_id1', $playerId)
            ->orWhere('player_id2', $playerId)
            ->orWhere('player_id3', $playerId)
            ->orWhere('player_id4', $playerId)
            ->get();

        if ($playerInTournamentTableMulti->isNotEmpty()) {
            $playerFoundDetails = $playerInTournamentTableMulti->toArray();
            $this->removePlayerFromTable($playerInTournamentTableMulti, $playerId);
        }

        if (!empty($playerFoundDetails)) {
            $type = $playerFoundDetails[0]['player_type']; // Accessing player_type directly from the first element in the array
            if ($type === '1v1') {
                // Find or create a record for the player and increment twoPlayWin by 1
                $userData = Userdata::updateOrCreate(
                    ['playerid' => $playerId],
                    []
                );

                // Increment the twoPlayWin field by 1
                $userData->increment('twoPlayloss');
            }

            if ($type === '1v3') {
                // Find or create a record for the player and increment twoPlayWin by 1
                $userData = Userdata::updateOrCreate(
                    ['playerid' => $playerId],
                    []
                );

                // Increment the twoPlayWin field by 1
                $userData->increment('FourPlayloss');
            }
        }

        // You can then output the data in the response
        $responseData = [
            'player_id' => $playerId,
            'player_found_details' => $playerFoundDetails,
        ];

        // Update user's status to indicate engagement in a game and set tournament_id and table_id
        UserData::updateOrCreate(
            ['playerid' => $playerId],
            [
                'in_game_status' => false,
                'tournament_id' => null,
                'table_id' => null,
                'bid_pay_status' => false,
            ]
        );

        return Response::json(['data' => $responseData], 200);
    }

    public function newnextround(Request $request)
    {
        $ongoingTournaments = Tournament::where('t_status', 'ongoing')->get();

        if ($ongoingTournaments->isEmpty()) {
            return response()->json([
                'success' => false,
                'error' => 'No Ongoing Tournaments Found',
                'responsemessage' => 'No Ongoing Tournaments Found'
            ], 200);
        }

        foreach ($ongoingTournaments as $tournament) {
            if ($this->allGamesHaveWinners($tournament->id) && $this->allWinnersAreFilled($tournament->id)) {
                $gametype = $tournament->player_type;
                $tournamentid = $tournament->tournament_id;
                $totalwinners = TournamentTablemulti::where('tournament_id', $tournamentid)->whereNotNull('winner')->count();
                $totalnumberoftables = TournamentTablemulti::where('tournament_id', $tournamentid)->count();

                if ($totalwinners === 1) {
                    // If there is only one winner and one table
                    $winner = TournamentTablemulti::where('tournament_id', $tournament->tournament_id)->whereNotNull('winner')->first();
                    $winningPlayerId = $winner->winner;
                    $this->setwinner($tournament->tournament_id, $winningPlayerId);

                    return response()->json([
                        'success' => true,
                        'responsemessage' => 'Tournament completed with one winner.',
                        'data' => [
                            'winner_id' => $winningPlayerId,
                            'message' => 'Congratulations to the winner!'
                        ]
                    ], 200);
                }

                if ($totalwinners == $totalnumberoftables) {

                    // Assuming you have a variable $tournament containing the tournament details
                    $winners = TournamentTablemulti::where('tournament_id', $tournament->tournament_id)
                        ->whereNotNull('winner')
                        ->get();

                    foreach ($winners as $winner) {
                        $playerId = $winner->winner;

                        // Assuming UserData is your model for player data
                        $player = UserData::where('playerid', $playerId)->first();

                        if ($player) {
                            // Assuming 'reward_amount' is the amount to be rewarded as wincoin
                            $rewardAmount = $tournament->roundprize;

                            // Update the player's wincoin
                            $player->increment('wincoin', $rewardAmount);
                        }
                    }

                    // Clear existing tables
                    TournamentTablemulti::where('tournament_id', $tournament->tournament_id)->delete();

                    // Create new tables to accommodate all players
                    $newnooftables = ceil($totalwinners / ($gametype == "1v1" ? 2 : 4));

                    $x = Tournament::where("tournament_id", $tournament->tournament_id)->first();

                    $perRoundAmount = $x['perroundamount'];
                    $newroundPrize = $perRoundAmount / $newnooftables;

                    // Update round prize in the tournament
                    $tournament->update(['roundprize' => $newroundPrize]);

                    for ($i = 1; $i <= $newnooftables; $i++) {
                        TournamentTablemulti::create([
                            'tournament_id' => $tournament->tournament_id,
                            'table_id' => $i,
                            'game_name' => $tournament->tournament_name . ' ' . $i,
                            'player_type' => $gametype,
                            'status' => ($gametype === '1v1') ? '0/2' : '0/4'
                        ]);
                    }

                    return response()->json([
                        'success' => true,
                        'responsemessage' => 'New round created successfully.',
                        'data' => [
                            'new_round_tables' => $newnooftables,
                            'message' => 'Get ready for the next round!'
                        ]
                    ], 200);
                }
            }
        }

        // No specific condition met, return a generic success response
        return response()->json([
            'success' => true,
            'responsemessage' => 'No Action Taken',
        ], 200);
    }

    private function allGamesHaveWinners($tournamentId)
    {
        return !TournamentTablemulti::where('tournament_id', $tournamentId)->whereNull('winner')->exists();
    }

    private function allWinnersAreFilled($tournamentId)
    {
        return TournamentTablemulti::where('tournament_id', $tournamentId)->whereNull('winner')->count() === 0;
    }

    private function setwinner($tournamentId, $playerId)
    {
        // Find the tournament winner
        $tournament = Tournament::where('tournament_id', $tournamentId)->first();

        if ($tournament) {
            // Get the reward amount from the tournament
            $type = $tournament->player_type;

            // Update the player's totalcoin by adding the reward
            $player = Userdata::where('playerid', $playerId)->first();
            if ($player) {

                TournamentTablemulti::where('tournament_id', $tournamentId)->delete();

                // $player->wincoin += $reward;
                $player->save();

                // Reset tournament status and winner
                $tournament->t_status = 'completed';
                $tournament->winner = $playerId;
                $tournament->save();

                if ($type === '1v1') {
                    // Find or create a record for the player and increment twoPlayWin by 1
                    $userData = Userdata::updateOrCreate(
                        ['playerid' => $playerId],
                        []
                    );

                    // Increment the twoPlayWin field by 1
                    $userData->increment('twoPlayWin');
                }

                if ($type === '1v3') {
                    // Find or create a record for the player and increment twoPlayWin by 1
                    $userData = Userdata::updateOrCreate(
                        ['playerid' => $playerId],
                        []
                    );

                    // Increment the twoPlayWin field by 1
                    $userData->increment('FourPlayWin');
                }

                // Update user's status to indicate engagement in a game and set tournament_id and table_id
                UserData::updateOrCreate(
                    ['playerid' => $playerId],
                    [
                        'in_game_status' => false,
                        'tournament_id' => null,
                        'table_id' => null,
                        'bid_pay_status' => false,
                    ]
                );

                return response()->json([
                    'success' => true,
                    'message' => 'Rewards transferred to the tournament winner successfully',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Player not found',
                ], 200);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Tournament or winner not found or winner does not match',
            ], 200);
        }
    }

    public function updateplayersstatus(Request $request)
    {
        $busyplayers = Userdata::where('in_game_status', 1)->get();

        $playersInGame = $busyplayers->map(function ($player) {
            return [
                'playerid' => $player->playerid,
                'ingame_status' => $player->in_game_status,
                'tournament_id' => $player->tournament_id,
                'table_id' => $player->table_id,
                'bid_pay_status' => $player->bid_pay_status,
            ];
        });

        foreach ($playersInGame as &$player) {
            $playerid = $player['playerid'];
            $playerfound = TournamentTablemulti::where('player_id1', $playerid)
                ->orWhere('player_id2', $playerid)
                ->orWhere('player_id3', $playerid)
                ->orWhere('player_id4', $playerid)
                ->get();

            if ($playerfound->isNotEmpty()) {
                $correctTournament = $playerfound->first(function ($foundPlayer) use ($player) {
                    return $foundPlayer->tournament_id == $player['tournament_id'];
                });

                if (!$correctTournament) {
                    // Player is in the wrong tournament
                    $data = Userdata::where('playerid', $playerid)->first();
                    $data->tournament_id = $correctTournament->tournament_id;
                    $data->table_id = $correctTournament->table_id;
                    $data->save();
                }
            } else {
                // Player is not found in the tournamenttablemulti model
                $data1 = Userdata::where('playerid', $playerid)->first();
                $data1->in_game_status = null;
                $data1->tournament_id = null;
                $data1->table_id = null;
                $data1->save();
            }
        }

        // Return a general response if needed
        return response()->json([
            'success' => true,
            'message' => 'Successful Run',
            'responsedata' => $playersInGame,
        ]);
    }
    public function getTotalPlayersInTournament(Request $request)
    {
        $tournamentId = $request->tournament_id;
    
        $players = UserData::where('tournament_id', $tournamentId)
            ->select('playerid', 'photo') // Add any additional columns you need
            ->get();
    
        if ($players->count() > 0) {
            return response()->json([
                'success' => true,
                'players' => $players,
                'message' => 'All players in the tournament with pfp and player ID.',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'No Players Found',
                'message' => 'No players are currently in the tournament.',
            ], 200);
        }
    }
    public function getAllLevelsAndRoundPrizes(Request $request)
    {
        $tournamentId = $request->tournament_id;
        $tournament = Tournament::where('tournament_id', $tournamentId)->first();

        if (!$tournament) {
            return response()->json([
                'success' => false,
                'error' => 'Tournament Not Found',
                'message' => 'Tournament with the specified ID not found.',
            ], 200);
        }

        $numTables = $tournament->nooftables;
        $totalRounds = ($tournament->player_type == '1v1') ? log($numTables, 2) + 1 : log($numTables, 4) + 1;

        $perRoundAmount = $tournament->perroundamount;
        $roundPrizes = [];

        for ($currentRound = 1; $currentRound <= $totalRounds; $currentRound++) {
            // Additional logic for each round if needed

            // Retrieve round prize for the current round
            $roundPrize = $perRoundAmount / $numTables;

            // Calculate player prize for the current round
            $totalWinners = pow(($tournament->player_type == '1v1') ? 2 : 4, $currentRound - 1);
            $playerPrize = $roundPrize / $totalWinners;

            // Save the round prize and player prize to the array
            $roundPrizes[] = [
                'round_number' => (($totalRounds + 1) - $currentRound),
                'round_prize' => $roundPrize,
                'player_prize' => $playerPrize,
            ];
        }

        return response()->json([
            'success' => true,
            'levels' => $totalRounds,
            'round_prizes' => $roundPrizes,
            'message' => 'Levels, round prizes, and player prizes information.',
        ], 200);
    }
}
