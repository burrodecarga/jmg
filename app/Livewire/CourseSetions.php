<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Section;
use App\Models\Course;

class CourseSetions extends Component
{
    public $open=false;
    public $openConfirm=false;
    public $openLesson=false;
    public $course;
    public $section;
    public $sectionId;
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

    public function edit(Section $section){
        $this->section = $section->name;
        $this->sectionId = $section->id;
        $this->open = true;
    }

    public function update(){
        $this->validate();
        $sectionUpdate = Section::find($this->sectionId);
        $sectionUpdate->name = $this->section;
        $sectionUpdate->save();
        $this->open = false;
        $message = __('the action was completed successfully.');
        $this->sections = $this->course->sections;
        flash()->options([
            'timeout' => 1000,
        ])->success($message);
    }

    public function confirm (Section $section){
        $this->section = $section->name;
        $this->sectionId = $section->id;
        $this->openConfirm = true;
    }

    public function delete(){
        Section::destroy($this->sectionId);
        $this->openConfirm = false;
        $this->sections = $this->course->sections;
        $message = __('the action was completed successfully.');
        flash()->options([
            'timeout' => 1000,
        ])->success($message);
    }

    public function addLesson(Section $section){
        $this->section = $section->name;
        $this->sectionId = $section->id;
        $this->openLesson = true;
    }
}
