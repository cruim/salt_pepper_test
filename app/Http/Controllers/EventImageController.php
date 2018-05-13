<?php

namespace App\Http\Controllers;

use App\EventImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;

//use \Input as Input;

class EventImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        return view('image_upload');
    }

    function getFiles(Request $request)
    {
        if (Input::hasFile('file')) {
            $file = Input::file('file');
            $file_name = $file->getClientOriginalName();
            $file->move('images', $file_name);
            $user_id = Auth::user()->id;

            $this->addImageUrlIntoDb($user_id, $file_name);

            $event_standings = new EventStandingsController();
            $event_standings->createRecord($user_id);
        }
        return redirect()->to('/event_standings');
    }

    function addImageUrlIntoDb($user_id, $file_name)
    {
        return EventImage::updateOrCreate(['user_id' => $user_id], ['image_url' => $file_name]);
    }
}
