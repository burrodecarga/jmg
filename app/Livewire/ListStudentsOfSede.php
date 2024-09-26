<?php

namespace App\Livewire;

use Livewire\Component;

class ListStudentsOfSede extends Component
{
    public function mount(Sede $sede){
        $this->sede = $sede;
        $this->students = $sede->students;
       }
    public function render()
    {
        return view('livewire.list-students-of-sede');
    }
}
