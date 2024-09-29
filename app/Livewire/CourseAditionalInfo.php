<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Request;
use App\Models\Course;

class CourseAditionalInfo extends Component
{
    public $course;
    public $levels;
    public $categories;
    public $level_id;
    public $category_id;
    public $subtitle;
    public $description;

    public function mount(Course $course, $levels, $categories){
        $this->course = $course;
        $this->levels = $levels;
        $this->categories = $categories;
        $this->subtitle = $course->subtitle;
        $this->description = $course->description;
        $this->level_id = $course->level_id;
        $this->category_id = $course->category_id;
    }

    protected $rules = [
            'subtitle' => 'required',
        ];


    public function render()
    {
        return view('livewire.course-aditional-info');
    }

    public function modify(){

        $this->validate();

        $this->course->subtitle = $this->subtitle;
        $this->course->description = $this->description;
        $this->course->level_id = $this->level_id;
        $this->course->category_id = $this->category_id;
        $this->course->save();
        $courseId = $this->course->id;
        $this->reset();

        $message = __('The course info updated');
        return redirect()->route('config_course',$courseId)->with('success', $message);


    }
}
