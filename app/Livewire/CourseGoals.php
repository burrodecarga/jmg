<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Goal;
use App\Models\Course;

class CourseGoals extends Component
{
    public $course;
    public $goal;
    public $goals=[];


    public function mount(Course $course){
        $this->course = $course;
        $this->goals = $course->goals;
         }

    protected $rules = [
            'goal' => 'required',
        ];
    public function render()
    {
        return view('livewire.course-goals');
    }

    public function addGoal(){

        $this->validate();
        $courseId = $this->course->id;

        $goal = new Goal();
        $goal->course_id = $courseId;
        $goal->name = strtolower($this->goal);
        $goal->save();
        $this->reset();
        $message = __('The course info updated');
        return redirect()->route('config_course',$courseId)->with('success', $message);


    }
}
