<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Requeriment;
use App\Models\Course;
use Flasher\Prime\FlasherInterface;

class CourseRequeriments extends Component
{
    public $open=false;
    public $openConfirm=false;
    public $course;
    public $requeriment;
    public $requerimentId;
    public $requeriments=[];


    public function mount(Course $course){
        $this->course = $course;
        $this->requeriments = $course->requeriments;
        //$this->requeriment = new Requeriment();
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
        $newRequeriment = new Requeriment();
        $newRequeriment->course_id = $courseId;
        $newRequeriment->name = strtolower($this->requeriment);
        $newRequeriment->save();
        $this->reset('requeriment');
        $message = __('the action was completed successfully.');
        $this->requeriments = $this->course->requeriments;
        flash()->options([
            'timeout' => 1000,
        ])->success($message);
    }

    public function edit(Requeriment $requeriment){
        $this->requeriment = $requeriment->name;
        $this->requerimentId = $requeriment->id;
        $this->open = true;
    }

    public function update(){
        $this->validate();
        $requerimentUpdate = Requeriment::find($this->requerimentId);
        $requerimentUpdate->name = $this->requeriment;
        $requerimentUpdate->save();
        $this->open = false;
        $message = __('the action was completed successfully.');
        $this->requeriments = $this->course->requeriments;
        flash()->options([
            'timeout' => 1000,
        ])->success($message);
    }

    public function confirm (Requeriment $requeriment){
        $this->requeriment = $requeriment->name;
        $this->requerimentId = $requeriment->id;
        $this->openConfirm = true;
    }

    public function delete(){
        Requeriment::destroy($this->requerimentId);
        $this->openConfirm = false;
        $this->requeriments = $this->course->requeriments;
        $message = __('the action was completed successfully.');
        flash()->options([
            'timeout' => 1000,
        ])->success($message);

    }
}
