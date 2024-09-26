<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Lectivo;
use App\Models\Course;

class AddTeacherToCourse extends Component
{
    public $lectivo;
    public $sede;
    public $teachers;
    public $course_id;
    public $teacher_id;

    public function mount($lectivo, $teachers)
    {
           $this->lectivo = $lectivo;
           $this->teachers =$teachers;

    }

    protected $rules = [
    //    'course_id' => 'required|numeric',
        'teacher_id' => 'required|numeric',
    ];

    public function render()
    {
        return view('livewire.add-teacher-to-course');
    }

    public function addTeacher(){
    $this->validate();
    $teacher = Teacher::find($this->teacher_id);
    $this->lectivo->teacher_id = $teacher->id;
    $this->lectivo->teacher_name = $teacher->full_name;
    $this->lectivo->save();
    return redirect()->to('coordinator/add_teachers_to_lectivo/'.$this->lectivo->sede_id);
    }
}
