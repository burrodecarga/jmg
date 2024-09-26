<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Sede;
use App\Models\Periodo;
use App\Models\Lectivo;
use App\Models\Grado;
use App\Models\Course;

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
        $lectivos = Lectivo::where('sede_id',$sede->id)->get();
        return view('coordinator.add_teachers_to_lectivo',compact('sede','lectivos'));

    }

    public function add_teacher_to_course(Lectivo $lectivo){
        $sede = Sede::find($lectivo->sede_id);
        $teachers = $sede->teachers;
        return view('coordinator.add_teacher_to_course',compact('lectivo','teachers'));
    }

    // public function list_of_course($id){
    //     $lectivos = Lectivo::where('sede_id',$id)->get();
    //     $sede = Sede::find($id);
    //     $teachers = $sede->teachers;
    //     return view('coordinator.list_of_course', compact('lectivos','teachers','sede'));
    // }
}
