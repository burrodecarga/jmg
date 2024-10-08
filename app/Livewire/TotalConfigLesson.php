<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Lesson;

class TotalConfigLesson extends Component
{
    public $lesson, $name,$description,$lessonId;
    public function mount(Lesson $lesson){
       $this->lesson = $lesson;
       $this->name = $lesson->name;
       $this->description = $lesson->description;
       $this->lessonId = $lesson->id;
    }
    public function render()
    {
        return view('livewire.total-config-lesson');
    }
}
