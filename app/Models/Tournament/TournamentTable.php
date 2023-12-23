<?php

namespace App\Models\Tournament;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournamentTable extends Model
{
    use HasFactory;

    protected $fillable = [
        "tournament_id",
        "table_id",
        "game_name",
        "player_id1",
        "player_id2",
        "winner",
        ];
}
