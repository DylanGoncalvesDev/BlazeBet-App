<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SportMatch extends Model
{
    //
    protected $table = 'matches';

    protected $fillable = ['home_team_id', 'away_team_id', 'date', 'location', 'stage', 'status', 'home_team_score', 'away_team_score', 'sport', 'competition_id'];

    public function homeTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'home_team_id');
    }

    public function awayTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'away_team_id');
    }

    public function competition(): BelongsTo
    {
        return $this->belongsTo(Competition::class, 'competition_id');
    }
}
