<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Sede;
use App\Models\Periodo;
use App\Models\Grado;

class CoordinatorController extends Controller
{
    public function index() {
        $sede = auth()->user()->coordina()->first();

        //dd($sede->grados);
        $grados = Grado::all();
        $periodos = Periodo::all();
        return view('coordinator.index',compact('sede','periodos','grados'));
    }

    public function add_sections(Sede $sede){
        $grados = Grado::all();
        $periodos = Periodo::all();
        return view('coordinator.add_secciones',compact('sede','periodos','grados'));
    }

    public function add_teachers(Sede $sede){
        $teachers = Teacher::orderBy('full_name')->get();
        $periodos = Periodo::all();
        return view('coordinator.add_teachers',compact('sede','periodos','teachers'));


    }
}
