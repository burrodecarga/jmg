<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Lesson;

class EditLesson extends Component
{
    public $openLesson = false;
    public $lesson, $description;

    public function mount(Lesson $lesson)
    {
        $this->lesson = $lesson;
    }


    public function render()
    {
        return view('livewire.edit-lesson');
    }
}
