<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Section;
use App\Models\Course;

class CourseSetions extends Component
{
    public $course;
    public $section;
    public $sections=[];


    public function mount(Course $course){
        $this->course = $course;
        $this->sections = $course->sections;
         }

    protected $rules = [
            'section' => 'required',
        ];

    public function render()
    {
        return view('livewire.course-setions');
    }


    public function addSection(){
        $this->validate();
        $courseId = $this->course->id;
        //dd($courseId);
        $section = new Section();
        $section->course_id = $courseId;
        $section->name = strtolower($this->section);
        $section->save();
        $this->reset();
        $message = __('The course info updated');
        return redirect()->route('config_course',$courseId)->with('success', $message);
    }
}
