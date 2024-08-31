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
    public function edit($id)
    {
        $room = Room::findOrFail($id); // Find the room by ID or fail if not found
        return view('admin.edit_rooms', compact('room')); // Return the edit view with the room data
    }
    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);
    
        // Validate the request data
        $request->validate([
            'room_number' => 'required',
            'room_type' => 'required',
            'capacity' => 'required|integer',
        ]);

        // Update room data
        $room->update([
            'room_number' => $request->room_number,
            'room_type' => $request->room_type,
            'capacity' => $request->capacity,
            // Add other fields as necessary
        ]);

        return redirect()->route('rooms.index')->with('success', 'Room updated successfully!');
    }
    public function toggleStatus($id)
    {
        $room = Room::findOrFail($id);
        // var_dump($room);
        // Toggle the is_allotted status
        $room->is_allotted = !$room->is_allotted;
        $room->save();

        // // Respond with a JSON response
        return response()->json(['success' => true]);
    }
}
