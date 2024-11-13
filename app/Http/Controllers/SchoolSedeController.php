<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\StoresedeRequest;
use App\Models\Room;
use App\Models\School;
use App\Models\Sede;
use App\Models\Grado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SchoolSedeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(School $school)
    {
        $sedes = $school->sedes;
        return view('super.sedes.index', compact('school', 'sedes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(School $school)
    {
        $sede = new Sede();
        $sede->school_id = $school->id;
        $title = "sede create";
        $btn = "create";
        return view('super.sedes.create', compact('school', 'sede', 'title', 'btn'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(School $school, StoresedeRequest $request)
    {
        //dd($request->all(), $school);
        $sede = Sede::create([
            //'name' => mb_strtolower($request->input('name')),
            'address' => mb_strtolower($request->input('address')),
            'department' => mb_strtolower($request->input('department')),
            'municipality' => mb_strtolower($request->input('municipality')),
            'email' => mb_strtolower($request->input('email')),
            'phone' => mb_strtolower($request->input('phone')),
            'cell' => mb_strtolower($request->input('cell')),
            'name' => $school->name,
            'nit' => $school->nit,
            'dane' => $school->dane,
            'school_id' => $school->id,
        ]);

        if ($request->file('logo')) {

            $file = $request->file('logo')->store('public/schools');
            $logo = Storage::url($file);
            //$school->images()->create(['url' => $url,]);
            $sede->logo = $logo;
            $sede->save();
        }

        if ($request->file('image')) {

            $file = $request->file('image')->store('public/schools');
            $image = Storage::url($file);
            //$school->images()->create(['url' => $url,]);
            $sede->image = $image;
            $sede->save();
        }
        $message = __('sede created successfully');
        $sedes = $school->sedes;
        //return redirect()->route('schools.sedes.index', compact('school', 'sedes'))->with('success', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school, Sede $sede)
    {
        //dd($school->id, $sede->id);
        return view('super.sedes.sede', compact('sede', 'school'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, School $school)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        //
    }


    public function room_create($id)
    {
        //dd($id);
        $sede = Sede::find($id);
        $school = $sede->school;
        $room = new Room();
        $room->sede_id = $sede->id;
        $room->school_id = $sede->school_id;
        $room->name = 'aula';
        $rooms = $sede->rooms;
        $title = __('create room to');
        return view('super.sedes.room_create', compact('school', 'sede', 'rooms', 'room', 'title'));
    }

    public function room_store(StoreRoomRequest $request)
    {
        $w = $request->input('width');
        $l = $request->input('long');
        $c = $w * $l * Room::CAPACITY;


        $room = Room::create([
            'sede_id' => mb_strtolower($request->input('sede_id')),
            'name' => mb_strtolower($request->input('name')),
            'width' => mb_strtolower($request->input('width')),
            'long' => mb_strtolower($request->input('long')),
            'high' => mb_strtolower($request->input('high')),
            'capacity' => round($c)

        ]);
        // $room->capacity = round($c);
        //$room->save();
        //dd($c, $room);

        $message = __('room created successfully');
        return redirect()->route('rooms.index')->with('success', $message);
    }

    public function manager_create($id)
    {
        //dd($id);
        $sede = Sede::find($id);
        $school = $sede->school;
        // $room = new Room();
        // $room->sede_id = $sede->id;
        // $room->school_id = $sede->school->id;
        // $room->name = 'aula';
        // $rooms = $sede->rooms;
        $title = 'assign mannager to';
        return view('super.sedes.manager_create', compact('school', 'sede', 'title'));
    }


    public function coordinator_create($id)
    {
        //dd($id);
        $sede = Sede::find($id);
        $school = $sede->school;
        // $room = new Room();
        // $room->sede_id = $sede->id;
        // $room->school_id = $sede->school->id;
        // $room->name = 'aula';
        // $rooms = $sede->rooms;
        $title = 'assign mannager to';
        return view('super.sedes.coordinator_create', compact('school', 'sede', 'title'));
    }

    public function grados_create($id)
    {
        //dd($id);
        $sede = Sede::find($id);
        $school = $sede->school;
        // $room = new Room();
        // $room->sede_id = $sede->id;
        // $room->school_id = $sede->school->id;
        // $room->name = 'aula';
        // $rooms = $sede->rooms;
        $grados = Grado::all();
        $grados_id = $sede->grados->pluck('id')->toArray();
        $title = 'assign grados to';
        return view('super.sedes.grados_create', compact('school', 'sede', 'grados', 'title', 'grados_id'));
    }

    public function grados_store(Request $request)
    {
        //dd($request->all());
        $grados = $request->only('grados');
        //dd($grados);
        $sede = Sede::find($request->id);
        if (count($grados) > 0) {
            foreach ($grados as $k => $g) {

                $sede->grados()->sync($g);
            }
        }
        $message = __('grados created successfully');
        return redirect()->route('sedes.index')->with('success', $message);
        ;
    }
}
