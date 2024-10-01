<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Requeriment;
use App\Models\Course;

class CourseRequeriments extends Component
{
    public $course;
    public $requeriment;
    public $requeriments=[];


    public function mount(Course $course){
        $this->course = $course;
        $this->requeriments = $course->requeriments;
         }

    protected $rules = [
            'requeriment' => 'required',
        ];

    public function render()
    {
        return view('livewire.course-requeriments');
    }

    public function addRequeriment(){
        $this->validate();
        $courseId = $this->course->id;
        //dd($courseId);
        $requeriment = new Requeriment();
        $requeriment->course_id = $courseId;
        $requeriment->name = strtolower($this->requeriment);
        $requeriment->save();
        $this->reset();
        $message = __('The course info updated');
        toastr()->success('Data has been saved successfully!');
        return redirect()->route('config_course',$courseId);
    }
}
