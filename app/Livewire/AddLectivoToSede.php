<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Sede;
use App\Models\Periodo;
use App\Models\Lectivo;
use App\Models\Grado;
use App\Models\Course;

class AddLectivoToSede extends Component
{
    public Sede $sede;
    public $secciones;
    public $periodos;
    public $periodo_id;

    public function mount(Sede $sede)
    {
        $this->sede = $sede;
        $this->secciones = DB::table('grado_sede')->where('sede_id',$sede->id)->get();
        $this->periodos = Periodo::orderBy('year')->where('current',1)->get();
    }

    protected $rules = [
        'periodo_id' => 'required|numeric',
    ];


    public function render()
    {
        return view('livewire.add-lectivo-to-sede');
    }

    public function createLectivo(){
        $this->validate();
        $select = Periodo::find($this->periodo_id);
        foreach($this->secciones as $seccion){
            $grado = Grado::find($seccion->grado_id);

            $existe = Lectivo::where('periodo_id',$select->id)
            ->where('school_id',$this->sede->school_id)
            ->where('sede_id',$seccion->sede_id)
            ->where('grado_id',$seccion->grado_id)->exists();
            if($existe){
                $message = __('The school period already exists');
            return redirect()->route('coordinators.index')->with('fail', $message);
            }

            $courses = Course::where('grado_id',$grado->id)->get();

            foreach($courses as $course){

               $data =[
                   'periodo_id'=>$this->periodo_id,
                   'start'=>$select->start,
                   'end'=>$select->end,
                   'year'=>$select->year,
                   'school_id'=>$this->sede->school_id,
                   'sede_id'=>$seccion->sede_id,
                   'grado_id'=>$seccion->grado_id,
                   'course_id'=>$course->id,
                   'course_name'=>$course->name,
                   'ordinal'=>$grado->ordinal,
                   'grado_name'=>$grado->name,
                   'level'=>$grado->level,
                   'numero'=>$seccion->numero,
                   'letra'=>$seccion->letra,
               ];
               $lectivo = Lectivo::create($data);

           }
        }
    }


}
