<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Http\Requests\StoreResourceRequest;
use App\Http\Requests\UpdateResourceRequest;
use App\Models\Room;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resources = Resource::all();
        return view('super.resources.index', compact('resources'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Room $room)
    {
        dd($room->id); //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResourceRequest $request)
    {
        //dd($request->all());
        $resource = Resource::create([
            'name' => mb_strtolower($request->input('name')),
            //'room_id' => mb_strtolower($request->input('room_id')),
            'category' => mb_strtolower($request->input('category')),
            'description' => mb_strtolower($request->input('description')),
            'quantity' => mb_strtolower($request->input('quantity')),
        ]);
        $message = __('resource created successfully');
        return redirect()->route('resources.index')->with('success', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Resource $resource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resource $resource)
    {
        $categories = RECURSOS;
        $title = "room edit";
        $btn = "update resource";
        return view('super.resources.edit', compact('categories', 'resource', 'btn', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResourceRequest $request, Resource $resource)
    {
        $resource->update([
            'name' => mb_strtolower($request->input('name')),
            //'room_id' => mb_strtolower($request->input('room_id')),
            'category' => mb_strtolower($request->input('category')),
            'description' => mb_strtolower($request->input('description')),
            'quantity' => mb_strtolower($request->input('quantity')),
        ]);
        $message = __('resource updated successfully');
        return redirect()->route('resources.index')->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resource $resource)
    {
        $resource->delete();
        $message = __('resource deleted successfully');
        return redirect()->route('resources.index')->with('success', $message);
    }
}
