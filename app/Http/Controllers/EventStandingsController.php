<?php

namespace App\Http\Controllers;

use App\EventStandings;
use App\User;
use Illuminate\Http\Request;
use Db;

class EventStandingsController extends Controller
{
    function createRecord($user_id)
    {
        return EventStandings::updateOrCreate(['user_id' => $user_id],['votes_count' => 0]);
    }

    function index()
    {
        $result = User::select(DB::raw("name, event_image.image_url"))
            ->join('event_image','user_id','=','id')
            ->where('id','=',Auth::user()->id)
            ->get();
    }
}
