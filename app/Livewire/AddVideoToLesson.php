<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Lesson;

class AddVideoToLesson extends Component
{

    public $openVideoModal=false;
    public $lesson,$lessonId;
    public $name,$url,$iframe,$platform;

    public function mount(Lesson $lesson){
      $this->lesson = $lesson;
      $this->lessonId = $lesson->id;
    }


    public function render()
    {
        return view('livewire.add-video-to-lesson');
    }
}
