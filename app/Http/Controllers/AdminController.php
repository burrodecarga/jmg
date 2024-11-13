<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Periodo;
use App\Models\Grado;
use PHPUnit\Framework\Constraint\IsEmpty;

class AdminController extends Controller
{
    public function index()
    {
        $school = School::where('administrator_id', auth()->user()->id)->first();

        if ($school->count() == 0) {
            $message = __('You do not yet have an assigned school to manage');
            return redirect()->back()->with('warning', $message);
        } else {

            $sedes = $school->sedes;
            $grados = Grado::all();
            $periodos = Periodo::all();
            return view('administrators.index', compact('school', 'sedes', 'periodos', 'grados'));
        }

    }

    public static function get_periodos()
    {
        return Periodo::all();
    }
}
