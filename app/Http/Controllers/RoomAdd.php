<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;


class RoomAdd extends Controller
{
    public function index(){
        $rooms=Room::all();
        // var_dump($rooms);
        return view('admin.rooms',compact(rooms));
    }
}
