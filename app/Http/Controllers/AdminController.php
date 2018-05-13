<?php

namespace App\Http\Controllers;

use App\EventImage;
use App\User;
use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    function index(Request $request)
    {
        if ($request->user()->role_id != '1') {
            return redirect()->back();
        }
        $result = User::select(DB::raw("name, user_roles.role, event_image.image_url, event_image.active, event_image.id"))
            ->join('event_image', 'user_id', '=', 'users.id')
            ->join('user_roles', 'user_roles.id', '=', 'users.role_id')
            ->get();

        return view('admin', ['result' => $result]);
    }

    function updateImageActive(Request $request)
    {
        $data = $request['request'];
        $id = $data['id'];

        $result = EventImage::where('id', $id)->first();

        if ($result->active == 0)
        {
            EventImage::where("id", "=", $id)
                ->update(["active" => 1]);
        } else
        {
            EventImage::where("id", "=", $id)
                ->update(["active" => 0]);
        }
    }
}
