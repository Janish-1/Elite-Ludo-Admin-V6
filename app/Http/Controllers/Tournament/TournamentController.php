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
        $tournaments = Tournament::latest()->paginate(10);

        foreach ($tournaments as $tournament) {
            $tournamentId = $tournament->tournament_id;

            $tables['1v1'] = TournamentTable::where('tournament_id', $tournamentId)->get();
            $tables['1v3'] = TournamentTablemulti::where('tournament_id', $tournamentId)->get();

            $tournament->tables = $tables;
        }

        return view("admin.Tournament.Tournament", compact('tournaments'));
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
        $tables = [];

        if ($tournament) {
            $tables['1v1'] = TournamentTable::where('tournament_id', $tournamentId)->get();
            $tables['1v3'] = TournamentTablemulti::where('tournament_id', $tournamentId)->get();

            return response()->json([
                'tournament' => $tournament,
                'tables' => $tables
            ], 200);
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

            return redirect('https://ludo.pujanpaath.com/admin/tournament')->with('success', 'Tournament and associated tables deleted successfully.');
        } else {
            return response()->json(['error' => 'Tournament not found.'], 404);
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
}
