<?php

namespace App\Http\Controllers\Tournament;

use App\Http\Controllers\Controller;
use App\Models\Tournament\Tournament;
use App\Models\Tournament\TournamentTable; // Import the TournamentTable model
use App\Models\Tournament\TournamentTablemulti; // Import the TournamentTable model
use App\Models\Player\Userdata;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;

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
            $tournaments  = Tournament::latest()->paginate(10);

            // Log the ongoing tournaments
            Log::info("Ongoing Tournaments - 0: ");
            foreach ($tournaments as $tournament) {
                $tournamentId = $tournament->tournament_id;
                $tables['1v1'] = TournamentTable::where('tournament_id', $tournamentId)->get();
                $tables['1v3'] = TournamentTablemulti::where('tournament_id', $tournamentId)->get();

                Log::info("Tournament ID: " . $tournamentId);
                Log::info("Tables for 1v1: " . $tables['1v1']->toJson());
                Log::info("Tables for 1v3: " . $tables['1v3']->toJson());

                // Convert time_start to DateTime object for accurate comparison
                $startTime = new \DateTime($tournament->time_start);
                $currentTime = now();

                if ($startTime < $currentTime && $tournament->t_status != 'completed') {
                    Tournament::where('tournament_id', $tournamentId)->update(['t_status' => 'ongoing']);
                }

                // Assign tables to the specific tournament
                $tournament->tables = $tables;

                // Log assigned tables for the specific tournament
                Log::info("Assigned Tables for Tournament ID " . $tournamentId . ": " . json_encode($tournament->tables));
            }

            $ongoingtournaments = Tournament::where('t_status', 'ongoing')->latest()->paginate(10);
            // Log the ongoing tournaments
            Log::info("Ongoing Tournaments - 1: ");
            foreach ($ongoingtournaments as $tournament) {
                $tournamentId = $tournament->tournament_id;
                $tables['1v1'] = TournamentTable::where('tournament_id', $tournamentId)->get();
                $tables['1v3'] = TournamentTablemulti::where('tournament_id', $tournamentId)->get();

                Log::info("Tournament ID: " . $tournamentId);
                Log::info("Tables for 1v1: " . $tables['1v1']->toJson());
                Log::info("Tables for 1v3: " . $tables['1v3']->toJson());

                // Assign tables to the specific tournament
                $tournament->tables = $tables;

                // Log assigned tables for the specific tournament
                Log::info("Assigned Tables for Tournament ID " . $tournamentId . ": " . json_encode($tournament->tables));
            }


            $completedTournaments = Tournament::where('t_status', 'completed')->latest()->paginate(10);

            // Log the completed tournaments
            Log::info("Completed Tournaments: ");
            foreach ($completedTournaments as $completedTournament) {
                $tournamentId = $completedTournament->tournament_id;
                $completedTables['1v1'] = TournamentTable::where('tournament_id', $tournamentId)->get();
                $completedTables['1v3'] = TournamentTablemulti::where('tournament_id', $tournamentId)->get();

                Log::info("Tournament ID: " . $tournamentId);
                Log::info("Tables for 1v1: " . $completedTables['1v1']->toJson());
                Log::info("Tables for 1v3: " . $completedTables['1v3']->toJson());

                // Assign tables to the specific completed tournament
                $completedTournament->tables = $completedTables;

                // Log assigned tables for the specific completed tournament
                Log::info("Assigned Tables for Completed Tournament ID " . $tournamentId . ": " . json_encode($completedTournament->tables));
            }

            return view("admin.Tournament.Tournament", compact('tournaments', 'completedTournaments'));
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
        $numberOfTables = $request->input('tables');
        $gameType = $tournamentData['player_type']; // Assuming 'game_type' is present in $tournamentData

        // Generate a unique random tournament ID with up to 5 characters
        $tournamentId = Str::random(3);

        $tournament = Tournament::create(array_merge($tournamentData, ['tournament_id' => $tournamentId]));

        if ($tournament) {
            for ($i = 1; $i <= $tournament->nooftables; $i++) {
                if ($gameType === '1v1') {
                    // Create tables in TournamentTable for '1v1' game type
                    TournamentTable::create([
                        'tournament_id' => $tournamentId,
                        'table_id' => $i,
                        'game_name' => $tournament->tournament_name . ' ' . $i,
                        // Other fields for 1v1 game type
                    ]);
                } elseif ($gameType === '1v3') {
                    // Create tables in TournamentTablemulti for '1v3' game type
                    TournamentTablemulti::create([
                        'tournament_id' => $tournamentId,
                        'table_id' => $i,
                        'game_name' => $tournament->tournament_name . ' ' . $i,
                        // Other fields for 1v3 game type
                    ]);
                }
                // Add conditions for other game types if needed
            }

            return redirect('admin/tournament')->with('success', 'Tournament and tables created successfully.');
        } else {
            return redirect('admin/tournament')->with('error', 'Failed to create Tournament.');
        }
    }

    public function findAllTournaments(Request $request)
    {
        $tournaments = Tournament::all();

        return response()->json([
            'tournaments' => $tournaments,
        ], 200);
    }

    public function findTournamentDetails(Request $request)
    {
        $tournamentId = $request->input('tournament_id');

        $tournament = Tournament::where('tournament_id', $tournamentId)->first();
        $games = [];

        if ($tournament) {
            $games['1v1'] = TournamentTable::where('tournament_id', $tournamentId)->get();
            $games['1v3'] = TournamentTablemulti::where('tournament_id', $tournamentId)->get();

            if ($games['1v1']->isEmpty() && $games['1v3']->isEmpty()) {
                return response()->json(['error' => 'No tables found for the tournament.'], 404);
            } elseif ($games['1v1']->isEmpty()) {
                unset($games['1v1']);
                return response()->json([
                    'tournament' => $tournament,
                    'games' => $games['1v3']
                ], 200);
            } elseif ($games['1v3']->isEmpty()) {
                unset($games['1v3']);
                return response()->json([
                    'tournament' => $tournament,
                    'games' => $games['1v1']
                ], 200);
            }
        } else {
            return response()->json(['error' => 'Tournament not found.'], 404);
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
            return response()->json(['error' => 'Tournament not found.'], 404);
        }
    }

    public function enrollPlayerInTable(Request $request)
    {
        $tournamentId = $request->input('tournament_id');
        $tableId = $request->input('table_id');
        $playerId = $request->input('player_id');

        // Check if the player ID, tournament ID, and table ID are provided
        if (!$playerId || !$tournamentId || !$tableId) {
            return response()->json(['error' => 'Player ID, tournament ID, or table ID is missing.'], 400);
        }

        $tableModel = null;

        $playerInGame = UserData::where('playerid', $playerId)
            ->where('in_game_status', true)
            ->exists();

        if ($playerInGame) {
            return response()->json(['error' => 'Player is already engaged in a game.'], 400);
        }

        // Retrieve the tournament instance by ID
        $tournament = Tournament::where('tournament_id', $tournamentId)->first();

        if (!$tournament) {
            return response()->json(['error' => 'Tournament not found.'], 404);
        }

        if ($tournament->player_type === '1v1') {
            $tableModel = TournamentTable::class;
            // Retrieve the table instance by tournament and table IDs
            $table = $tableModel::where('tournament_id', $tournamentId)
                ->where('table_id', $tableId)
                ->first();

            if (!$table) {
                return response()->json(['error' => 'Table not found for the tournament.'], 404);
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

            // Update user's status to indicate engagement in a game and set tournament_id and table_id
            UserData::updateOrCreate(
                ['playerid' => $playerId],
                [
                    'in_game_status' => true,
                    'tournament_id' => $tournamentId,
                    'table_id' => $tableId,
                    // Additional columns to store current_table_id, etc.
                ]
            );
            // Save changes to the table instance
            $table->save();
        } elseif ($tournament->player_type === '1v3') {
            $tableModel = TournamentTablemulti::class;
            // Retrieve the table instance by tournament and table IDs
            $table = $tableModel::where('tournament_id', $tournamentId)
                ->where('table_id', $tableId)
                ->first();

            if (!$table) {
                return response()->json(['error' => 'Table not found for the tournament.'], 404);
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
                    'in_game_status' => true,
                    'tournament_id' => $tournamentId,
                    'table_id' => $tableId,
                    // Additional columns to store current_table_id, etc.
                ]
            );

            // Save changes to the table instance
            $table->save();
        } else {
            return response()->json(['error' => 'Invalid game type for the tournament.'], 400);
        }

        return response()->json(['success' => 'Player enrolled in table successfully.'], 200);
    }

    public function deleteTournamentDetails(Request $request)
    {
        $tournamentId = $request->input('tournament_id');

        $tournament = Tournament::where('tournament_id', $tournamentId)->first();

        if ($tournament) {
            // Delete associated tables
            TournamentTable::where('tournament_id', $tournamentId)->delete();
            TournamentTablemulti::where('tournament_id', $tournamentId)->delete();

            // Delete tournament
            $tournament->delete();

            // Redirect to the specified URL after successful deletion
            return redirect('admin/tournament')->with('success', 'Tournament and associated tables deleted successfully.');
        } else {
            return response()->json(['error' => 'Tournament not found.'], 404);
        }
    }

    public function deleteAllTournaments()
    {
        // Get all tournaments
        $tournaments = Tournament::all();

        if ($tournaments->isNotEmpty()) {
            foreach ($tournaments as $tournament) {
                $tournamentId = $tournament->tournament_id;

                // Delete associated tables for each tournament
                TournamentTable::where('tournament_id', $tournamentId)->delete();
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
            return Response::json(['error' => 'Player ID is missing.'], 400);
        }

        $playerFoundDetails = [];

        // Find player in TournamentTable
        $playerInTournamentTable = TournamentTable::where('player_id1', $playerId)
            ->orWhere('player_id2', $playerId)
            ->get();

        // Find player in TournamentTablemulti
        $playerInTournamentTableMulti = TournamentTablemulti::where('player_id1', $playerId)
            ->orWhere('player_id2', $playerId)
            ->orWhere('player_id3', $playerId)
            ->orWhere('player_id4', $playerId)
            ->get();

        if ($playerInTournamentTable->isNotEmpty()) {
            $playerFoundDetails['TournamentTable'] = $playerInTournamentTable->toArray();
            $this->removePlayerFromTable($playerInTournamentTable, $playerId);
        }

        if ($playerInTournamentTableMulti->isNotEmpty()) {
            $playerFoundDetails['TournamentTablemulti'] = $playerInTournamentTableMulti->toArray();
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
                // Additional columns to store current_table_id, etc.
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
            return Response::json(['error' => 'Player ID is missing.'], 400);
        }

        $playerFoundDetails = [];

        // Find player in TournamentTable
        $playerInTournamentTable = TournamentTable::where('player_id1', $playerId)
            ->orWhere('player_id2', $playerId)
            ->get();

        // Find player in TournamentTablemulti
        $playerInTournamentTableMulti = TournamentTablemulti::where('player_id1', $playerId)
            ->orWhere('player_id2', $playerId)
            ->orWhere('player_id3', $playerId)
            ->orWhere('player_id4', $playerId)
            ->get();

        if ($playerInTournamentTable->isNotEmpty()) {
            foreach ($playerInTournamentTable as $tournament) {
                $tournamentId = $tournament->tournament_id;
                $tableId = $tournament->table_id;

                // Update the winner in TournamentTable
                TournamentTable::where('tournament_id', $tournamentId)
                    ->where('table_id', $tableId)
                    ->update(['winner' => $playerId]);
            }
        }

        if ($playerInTournamentTableMulti->isNotEmpty()) {
            foreach ($playerInTournamentTableMulti as $tournamentMulti) {
                $tournamentIdMulti = $tournamentMulti->tournament_id;
                $tableIdMulti = $tournamentMulti->table_id;

                // Update the winner in TournamentTablemulti
                TournamentTablemulti::where('tournament_id', $tournamentIdMulti)
                    ->where('table_id', $tableIdMulti)
                    ->update(['winner' => $playerId]);
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
            return response()->json(['error' => 'No Tournament ID Found'], 400);
        }

        $typeoftournament = Tournament::where('tournament_id', $tournamentId)->get();

        if ($typeoftournament->isEmpty()) {
            return response()->json(['error' => 'Tournament not found'], 404);
        }

        $tournament = $typeoftournament->first();
        $type = $tournament['player_type'];
        $game_type = $tournament['game_type'];
        $time_start = $tournament['time_start'];
        $prize_pool = $tournament['prize_pool'];
        $tournament_name = $tournament['tournament_name'];
        $entry_fee = $tournament['entry_fee'];

        $winnersArray = []; // Initialize an empty array to store winner data

        $functionsAccessed = []; // Array to track accessed functions

        if ($type === '1v1') {
            $functionsAccessed[] = 'handle1v1NextRound'; // Function accessed for 1v1
            $winnersData = TournamentTable::where('tournament_id', $tournamentId)
                ->whereNotNull('winner') // Filter where winner is not null
                ->get(['winner']);

            if ($winnersData->isEmpty()) {
                return response()->json(['error' => 'No winners found for 1v1 tournament'], 404);
            }

            $winnersArray = $winnersData->pluck('winner')->toArray();

            // Delete existing tables related to the tournament ID
            TournamentTable::where('tournament_id', $tournamentId)->delete();

            // Create empty tables for the next round
            $this->createTablesForNextRound($tournamentId, $tournament_name, $ntables);
        } else if ($type === '1v3') {
            $functionsAccessed[] = 'handle1v3NextRound'; // Function accessed for 1v3
            $winnersData = TournamentTablemulti::where('tournament_id', $tournamentId)
                ->whereNotNull('winner') // Filter where winner is not null
                ->get(['winner']);

            if ($winnersData->isEmpty()) {
                return response()->json(['error' => 'No winners found for 1v3 tournament'], 404);
            }

            $winnersArray = $winnersData->pluck('winner')->toArray();
            $totalnumberofwinners = count($winnersArray);
            $nooftables = $totalnumberofwinners / 4;

            $newTournamentId = $tournamentId . '1'; // Append the string to the tournament ID

            $tournamentData = [
                "tournament_id" => $newTournamentId,
                "tournament_name" => $tournament_name,
                "prize_pool" => $prize_pool,
                "time_start" => $time_start,
                "player_type" => $type,
                "game_type" => $game_type,
                "entry_fee" => $entry_fee,
                "nooftables" => $nooftables
            ];

            $this->CreateTournamentWithTablesAndId($tournamentData);
            $functionsAccessed[] = 'CreateTournamentWithTablesAndId'; // Function accessed for tournament creation
            $this->enrollPlayers1v3($tournamentId, $winnersArray);
            $functionsAccessed[] = 'enrollPlayers1v3'; // Function accessed for enrolling players
        }

        return response()->json([
            "message" => "Successfully Created the Next Round Data Table",
            "success" => true,
            "functions_accessed" => $functionsAccessed // Include accessed functions in the response
        ]);
    }

    private function createTablesForNextRound($tournamentId, $tournament_name, $ntables)
    {
        for ($i = 0; $i < $ntables; $i++) {
            TournamentTable::create([
                'tournament_id' => $tournamentId,
                'table_id' => $i + 1,
                'game_name' => $tournament_name . ' ' . ($i + 1),
            ]);
        }
    }

    private function CreateTournamentWithTablesAndId($tournamentData)
    {
        $tournamentId = $tournamentData['tournament_id']; // Assuming 'tournament_id' is present in $tournamentData
        $gameType = $tournamentData['player_type']; // Assuming 'player_type' is present in $tournamentData
        $numberOfTables = $tournamentData['nooftables'];

        $tournament = Tournament::create($tournamentData);

        for ($i = 1; $i <= $numberOfTables; $i++) {
            if ($gameType === '1v1') {
                // Create tables in TournamentTable for '1v1' game type
                TournamentTable::create([
                    'tournament_id' => $tournamentId,
                    'table_id' => $i,
                    'game_name' => $tournament->tournament_name . ' ' . $i,
                    // Other fields for 1v1 game type
                ]);
            } elseif ($gameType === '1v3') {
                // Create tables in TournamentTablemulti for '1v3' game type
                TournamentTablemulti::create([
                    'tournament_id' => $tournamentId,
                    'table_id' => $i,
                    'game_name' => $tournament->tournament_name . ' ' . $i,
                    // Other fields for 1v3 game type
                ]);
            }
            // Add conditions for other game types if needed
        }

        return response()->json(['success' => 'Tournament and tables created successfully.(Tournament Creation)'], 200);
    }

    private function enrollPlayers1v1($tournamentId, $winnersArray)
    {
        return $this->enrollPlayersForType($tournamentId, $winnersArray, TournamentTable::class, 2);
    }

    private function enrollPlayers1v3($tournamentId, $winnersArray)
    {
        // Validate if the tournament ID and winners array are provided
        if (empty($winnersArray) || !$tournamentId) {
            return response()->json(['error' => 'Invalid input. Player IDs or tournament ID is missing.'], 400);
        }

        // Retrieve the table instance by tournament ID and available slots
        $table = TournamentTablemulti::where('tournament_id', $tournamentId)
            ->whereNull('player_id4') // Check if the fourth slot is empty
            ->first();

        if (!$table) {
            return response()->json(['error' => 'No available tables or all tables are full.'], 400);
        }

        // Check the number of available slots to enroll players
        $availableSlots = 4 - count(array_filter([$table->player_id1, $table->player_id2, $table->player_id3, $table->player_id4]));

        if ($availableSlots <= 0) {
            return response()->json(['error' => 'No available slots in the table.'], 400);
        }

        foreach ($winnersArray as $index => $playerId) {
            if ($availableSlots > 0) {
                $table->{"player_id" . ($index + 1)} = $playerId;
                $availableSlots--;

                // Update user's status to indicate engagement in a game and set tournament_id and table_id
                UserData::updateOrCreate(
                    ['playerid' => $playerId],
                    [
                        'in_game_status' => true,
                        'tournament_id' => $tournamentId,
                        'table_id' => $table->table_id,
                        // Additional columns to store current_table_id, etc.
                    ]
                );
            }
        }

        // Update the table status based on the number of filled slots
        $filledSlots = 4 - $availableSlots;
        $table->status = "$filledSlots/4";

        // Save changes to the table instance
        $table->save();

        return response()->json(['success' => 'Players enrolled in tables successfully.'], 200);
    }

    private function enrollPlayersForType($tournamentId, $winnersArray, $tableModel, $totalPlayers)
    {
        foreach ($winnersArray as $playerId) {
            // Retrieve the table instance by tournament ID and available slots
            $table = $tableModel::where('tournament_id', $tournamentId)
                ->where(function ($query) use ($totalPlayers) {
                    for ($i = 2; $i <= $totalPlayers; $i++) {
                        $query->orWhereNull("player_id$i");
                    }
                })
                ->first();

            if (!$table) {
                return response()->json(['message' => 'All tables are full.'], 200);
            }

            // Check available slots and enroll the player accordingly
            for ($i = 1; $i <= $totalPlayers; $i++) {
                if (!$table->{"player_id$i"}) {
                    $table->{"player_id$i"} = $playerId;
                    $table->status = "$i/$totalPlayers";
                    break;
                }
            }

            // Update user's status to indicate engagement in a game and set tournament_id and table_id
            UserData::updateOrCreate(
                ['playerid' => $playerId],
                [
                    'in_game_status' => true,
                    'tournament_id' => $tournamentId,
                    'table_id' => $table->table_id,
                    // Additional columns to store current_table_id, etc.
                ]
            );

            // Save changes to the table instance
            $table->save();
        }

        return response()->json(['success' => 'Players enrolled in tables successfully.(1v1)'], 200);
    }

    public function tournamentwinner(Request $request)
    {
        $tournamentId = $request->input('tournament_id');
        $playerId = $request->input('playerid');

        // Update tournament status to 'completed' and set the winner
        Tournament::where('tournament_id', $tournamentId)->update([
            't_status' => 'completed',
            'winner' => $playerId,
        ]);
    }
}
