<?php

namespace App\Livewire;


use Livewire\Component;
use App\Models\Sede;
use App\Models\Grado;

class AddGradoToSede extends Component
{
   public $grados;
   public Sede $sede;
   public $grados_de_sede;

    public function mount($grados,Sede $sede){
     $this->grados = $grados;
     $this->sede = $sede;
     $this->grados_de_sede = $sede->grados;
    }

    public function render()
    {
        return view('livewire.add-grado-to-sede');
    }

    public function add($id){
        $cantidad = $this->sede->grados()->where('grado_id',$id)->count();
        $numero=NUMERO_DE_SECCION[$cantidad];
        $letra =SECCION[$cantidad];
        $this->sede->grados()->attach([$id=>['numero'=>$numero,'letra'=>$letra]]);
        $this->grados_de_sede = $this->sede->grados;
        $this->render();
        //$sede->grados()->sync($g);
    }

    public function del($id){
        $this->sede->grados()->detach([$id]);
        $this->grados_de_sede = $this->sede->grados;
        $this->render();
    }
}
