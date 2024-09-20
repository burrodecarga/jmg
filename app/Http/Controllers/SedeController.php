<?php

namespace App\Http\Controllers;

use App\Models\sede;
use App\Http\Requests\StoresedeRequest;
use App\Http\Requests\UpdatesedeRequest;

class SedeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sedes = Sede::all();
        return view('super.sedes.index', compact('sedes'));
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
    public function store(StoresedeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(sede $sede)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sede $sede)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatesedeRequest $request, sede $sede)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sede $sede)
    {
        //
    }
}
