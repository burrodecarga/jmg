<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Sede;
use App\Models\Periodo;

class AddLectivoToSede extends Component
{
    public $sede;
    public $grados;
    public $periodos;
    public $periodo_id;

    public function mount(Sede $sede)
    {
        $this->sede = $sede;
        $this->grados = $grados;
        $this->periodos = Periodo::orderBy('year')->get();
    }

    protected $rules = [
        'periodo_id' => 'required|numeric',
    ];


    public function render()
    {
        return view('livewire.add-lectivo-to-sede');
    }

    public function createLectivo(){
        $this->validate();
        foreach($this->grados as $grado){

        }

    }


}
