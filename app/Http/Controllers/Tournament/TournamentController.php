<?php

namespace App\Http\Controllers\Tournament;

use App\Http\Controllers\Controller;
use App\Models\Tournament\Tournament;
use App\Models\Tournament\TournamentTable; // Import the TournamentTable model
use App\Models\Tournament\TournamentTablemulti; // Import the TournamentTable model
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
        $data = Tournament::latest()->paginate(10);
        return view("admin.Tournament.Tournament", compact('data'));
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

        $tableModel = null;

        // Retrieve the tournament instance by ID
        $tournament = Tournament::where('tournament_id', $tournamentId)->first();

        if (!$tournament) {
            return response()->json(['error' => 'Tournament not found.'], 404);
        }

        // Check if '1v1' or '1v3' game type and find the appropriate table
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
                $table->status = '1/2';
            } elseif (!$table->player_id2) {
                $table->player_id2 = $playerId;
                $table->status = '2/2';
            } else {
                return response()->json(['message' => 'Table is full.'], 200);
            }

            // Save changes to the table instance
            $table->save();
        } 
        elseif ($tournament->player_type === '1v3') {
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
                $table->status = '1/4';
            } elseif (!$table->player_id2) {
                $table->player_id2 = $playerId;
                $table->status = '2/4';
            } elseif (!$table->player_id3) {
                $table->player_id3 = $playerId;
                $table->status = '3/4';
            } elseif (!$table->player_id4) {
                $table->player_id4 = $playerId;
                $table->status = '4/4';
            } else {
                return response()->json(['message' => 'Table is full.'], 200);
            }
        
            // Save changes to the table instance
            $table->save();
        }
         else {
            return response()->json(['error' => 'Invalid game type for the tournament.'], 400);
        }

        return response()->json(['success' => 'Player enrolled in table successfully.'], 200);
    }
}
