<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Resource;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();
        return view('super.rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //dd($room->id);
        if ($room->id <= -20) {
            abort(403);
        }
        $title = "room edit";
        $btn = "update room";
        return view('super.rooms.edit', compact('room', 'btn', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        $w = $request->input('width');
        $l = $request->input('long');
        $c = $w * $l * Room::CAPACITY;


        $room->update([
            //    'sede_id' => mb_strtolower($request->input('sede_id')),
            'name' => mb_strtolower($request->input('name')),
            'width' => mb_strtolower($request->input('width')),
            'long' => mb_strtolower($request->input('long')),
            'high' => mb_strtolower($request->input('high')),
            'capacity' => round($c)
        ]);
        $room->save();

        $message = __('room updated successfully');
        return redirect()->route('rooms.index')->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();

        $message = __('room deleted successfully');
        return redirect()->route('rooms.index')->with('success', $message);
    }

    public function create_resource($id)
    {
        $resource = new Resource();
        $categories = RECURSOS;
        $room = Room::find($id);
        $title = "add resource to room";
        $btn = "add resource";
        return view('super.rooms.resource', compact('categories', 'resource', 'room', 'btn', 'title'));
    }
}
