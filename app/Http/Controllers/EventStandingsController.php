<?php

namespace App\Http\Controllers;

use App\EventImage;
use App\EventStandings;
use App\User;
use App\UserToImage;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class EventStandingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function createRecord($user_id)
    {
        return EventStandings::updateOrCreate(['user_id' => $user_id], ['votes_count' => 0]);
    }

    function index()
    {
        $result = User::select(DB::raw("users.name, event_image.image_url, event_standings.votes_count, event_image.id"))
            ->join('event_image', 'user_id', '=', 'users.id')
            ->join('event_standings', 'event_standings.user_id', '=', 'users.id')
            ->where('event_image.active', '=', 1)
            ->get();

        return view('event_standings', ['result' => $result]);
    }

    function voteForImage(Request $request)
    {
        $user_id = Auth::user()->id;
        $data = $request['request'];
        $image_id = $data['image_id'];

        $check_record = UserToImage::select('is_vote')
            ->where('user_id', '=', $user_id)
            ->where('image_id', '=', $image_id)
            ->get();

        if (count($check_record) == 0) {
            UserToImage::updateOrCreate(['user_id' => $user_id, 'image_id' => $image_id], ['is_vote' => 1]);
        } elseif ($check_record[0]->is_vote == 1) {
            UserToImage::updateOrCreate(['user_id' => $user_id, 'image_id' => $image_id], ['is_vote' => 0]);
        } else {
            UserToImage::updateOrCreate(['user_id' => $user_id, 'image_id' => $image_id], ['is_vote' => 1]);
        }

        return $this->updateVoteCount($image_id);
    }

    function updateVoteCount($image_id)
    {
        $total = UserToImage::select(Db::raw("sum(is_vote) as votes_count"))
            ->where('image_id', '=', $image_id)
            ->get();

        $user_id = EventImage::select('user_id')
            ->where('id', '=', $image_id)
            ->get();

        $user_id = $user_id[0]->user_id;

        $votes_count = $total[0]->votes_count;

        $result = DB::table('event_standings')
            ->where('user_id', $user_id)
            ->update(['votes_count' => $votes_count]);

        return $votes_count;
    }
}
