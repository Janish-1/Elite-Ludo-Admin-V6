<?php

namespace App\Http\Controllers\Tournament;

use App\Http\Controllers\Controller;
use App\Models\Tournament\Tournament;
use App\Models\Tournament\TournamentTable; // Import the TournamentTable model
use App\Models\Tournament\TournamentTablemulti; // Import the TournamentTable model
use App\Models\Player\Userdata;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            return response()->json(['error' => 'Player ID is missing.'], 400);
        }

        // Find the player's data related to a tournament or table
        $playerData = UserData::where('playerid', $playerId)
            ->where(function ($query) {
                $query->whereNotNull('tournament_id')
                    ->orWhereNotNull('table_id');
            })
            ->first();

        if (!$playerData) {
            return response()->json(['error' => 'Player is not enrolled in any tournament or associated with a table.'], 400);
        }

        // Get the table ID associated with the player
        $tableId = $playerData->table_id;

        if ($tableId) {
            // Find the tournament tables based on the table ID in both TournamentTable and TournamentTablemulti
            $tournamentTable = TournamentTable::where('table_id', $tableId)->first();
            $tournamentTableMulti = TournamentTablemulti::where('table_id', $tableId)->first();

            if ($tournamentTable) {
                // Remove the player from TournamentTable
                $tournamentTable->update([
                    'player_id1' => TournamentTable::raw("CASE WHEN player_id1 = $playerId THEN NULL ELSE player_id1 END"),
                    'player_id2' => TournamentTable::raw("CASE WHEN player_id2 = $playerId THEN NULL ELSE player_id2 END"),
                    'status' => TournamentTable::raw('CONCAT_WS("/", IF(player_id1 IS NULL, 0, 1), IF(player_id2 IS NULL, 0, 1), IF(player_id3 IS NULL, 0, 1), IF(player_id4 IS NULL, 0, 1))'),
                ]);
            }

            if ($tournamentTableMulti) {
                // Remove the player from TournamentTablemulti
                $tournamentTableMulti->update([
                    'player_id1' => TournamentTablemulti::raw("CASE WHEN player_id1 = $playerId THEN NULL ELSE player_id1 END"),
                    'player_id2' => TournamentTablemulti::raw("CASE WHEN player_id2 = $playerId THEN NULL ELSE player_id2 END"),
                    'player_id3' => TournamentTablemulti::raw("CASE WHEN player_id3 = $playerId THEN NULL ELSE player_id3 END"),
                    'player_id4' => TournamentTablemulti::raw("CASE WHEN player_id4 = $playerId THEN NULL ELSE player_id4 END"),
                    'status' => TournamentTablemulti::raw('CONCAT_WS("/", IF(player_id1 IS NULL, 0, 1), IF(player_id2 IS NULL, 0, 1), IF(player_id3 IS NULL, 0, 1), IF(player_id4 IS NULL, 0, 1))'),
                ]);
            }
        }

        // Reset the player's tournament-related data in UserData
        $playerData->update([
            'tournament_id' => null,
            'table_id' => null,
            'in_game_status' => false,
            // Additional fields if needed
        ]);

        return response()->json(['success' => 'Player removed from tournaments or tables successfully.'], 200);
    }

    // Function to calculate the status of the table based on player IDs
    private function calculateTableStatus($table)
    {
        $occupiedCount = 0;
        $playerFields = ['player_id1', 'player_id2', 'player_id3', 'player_id4'];

        foreach ($playerFields as $field) {
            if ($table->$field !== null) {
                $occupiedCount++;
            }
        }

        return '0/' . $occupiedCount;
    }
}
