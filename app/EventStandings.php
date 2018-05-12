<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventStandings extends Model
{
    protected $table = 'event_standings';
    protected $fillable = ['id', 'user_id', 'votes_count'];
}
