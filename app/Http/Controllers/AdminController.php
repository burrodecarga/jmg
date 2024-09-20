<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo;
use App\Models\Grado;

class AdminController extends Controller
{
    public function index() {
        $sede = auth()->user()->coordina;
        //dd($sede);
        $grados = Grado::all();
        $periodos = Periodo::all();
        return view('admin.index',compact('sede','periodos','grados'));
    }

    public static function get_periodos()
    {
        return Periodo::all();
    }
}
