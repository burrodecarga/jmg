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
         if(is_null($sede)){
            $message = __('There is no assigned headquarters to coordinate');
            return redirect()->route('dashboard')->with('fail', $message);
        }

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

    public function create_lectivo(Sede $sede){
        $grados = $sede->grados;
        //dd($sede);
      //  $periodos = Periodo::orderBy('year')->get();
        return view('coordinator.create_lectivo',compact('sede'));

    }

    public function add_teachers_to_lectivo(Sede $sede){
        return view('coordinator.add_teachers_to_lectivo',compact('sede'));

    }
}
