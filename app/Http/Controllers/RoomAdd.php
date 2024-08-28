<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;


class RoomAdd extends Controller
{
    public function index(){
        $rooms = Room::all(); // Fetch all room records
        return view('admin.rooms', compact('rooms'));
    }
}
