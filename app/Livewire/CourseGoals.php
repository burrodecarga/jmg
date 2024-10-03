<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Goal;
use App\Models\Course;

class CourseGoals extends Component
{
    public $open=false;
    public $openConfirm=false;
    public $course;
    public $goal;
    public $goalId;
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
        $this->reset('goal');
        $message = __('The course info updated');
        flash()->options([
            'timeout' => 1000,
        ])->success($message);}

        public function edit(Goal $goal){
            $this->goal = $goal->name;
            $this->goalId = $goal->id;
            $this->open = true;
        }

        public function update(){
            $this->validate();
            $goalUpdate = Goal::find($this->goalId);
            $goalUpdate->name = $this->goal;
            $goalUpdate->save();
            $this->open = false;
            $message = __('the action was completed successfully.');
            $this->goals = $this->course->goals;
            flash()->options([
                'timeout' => 1000,
            ])->success($message);
        }

        public function confirm (Goal $goal){
            $this->goal = $goal->name;
            $this->goalId = $goal->id;
            $this->openConfirm = true;
        }

        public function delete(){
            Goal::destroy($this->goalId);
            $this->openConfirm = false;
            $this->goals = $this->course->goals;
            $message = __('the action was completed successfully.');
            flash()->options([
                'timeout' => 1000,
            ])->success($message);

        }
}
