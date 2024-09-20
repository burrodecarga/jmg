<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Sede;


class AddTeacherToSede extends Component
{
    public $cedula;
    public $existe_registro = false;
    public $teacher;
    public $sede;
    public $teachers=[];

    public function mount(Sede $sede)
    {
        $this->teachers = $sede->teachers;
        $this->sede = $sede;
    }

    protected $rules = [
        'cedula' => 'required|numeric',

    ];


    public function render()
    {
        return view('livewire.add-teacher-to-sede');
    }


    public function sincronizar(){
        $this->teacher->sedes()->attach([$this->sede->id=>['rol'=>'teacher']]);
        $this->sede = $this->sede->refresh();
        $this->teachers = $this->sede->teachers;
        $this->cedula=null;
        $this->render();

    }


    public function regresar(){
        $this->cedula=null;
            if(!is_null($this->sede)){ return redirect()->to('/coordinator/add_teachers/'.$this->sede->id);}else{
          return redirect()->to('/coordinator');

        }
    }

    public function addTeacher()
    {
        $this->validate();
        if(is_null($this->cedula)){$this->regresar();}
        $usuario = User::where('cedula', $this->cedula)->first();

        if(is_null($usuario) || $usuario==null) {
            return redirect()->to('/coordinator/coordinators');}
 //comprobamos si existe el teacher
        $profesor = Teacher::where('cedula', $this->cedula)->first();
        if(is_null($profesor)){
            if(is_null($usuario->id)) {$this->regresar();}
            $new_profesor = new Teacher();
            $new_profesor->user_id = $usuario->id;
            $new_profesor->cedula = $usuario->cedula;
            $new_profesor->name = $usuario->name;
            $new_profesor->email = $usuario->email;
            $new_profesor->last_name = $usuario->last_name;
            $new_profesor->full_name = $usuario->name .' '.$usuario->last_name;
            $new_profesor->save();
            $profesor = $new_profesor;
        }
   if(is_null($usuario)) {$this->regresar();}
       if(is_null($profesor)) {$this->regresar();}
        $existe_relacion = DB::table('sede_teacher')
        ->where('sede_id',$this->sede->id)
        ->where('teacher_id',$profesor->id)
        ->first();


        if(!is_null($existe_relacion)){
            $this->cedula=null;
            $this->regresar();
        }else{
            $this->teacher=$profesor;
            $this->sincronizar();
        }
    }

    public function del(Teacher $teacher){
        //dd($teacher);
        $teacher->sedes()->detach(['sede_id'=>$this->sede->id,'teacher_id'=>$teacher->id]);
        $this->sede = $this->sede->refresh();
        $this->teachers = $this->sede->teachers;
        $this->cedula=null;
        $this->render();
    }

}

