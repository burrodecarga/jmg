<?php

namespace App\Livewire;

use App\Models\Sede;
use App\Models\User;
use Livewire\Component;

use function Laravel\Prompts\alert;

class AddManagerToSede extends Component
{

    public $cedula;
    public $user;
    public $sede;
    public $managers=[];

    public function mount(Sede $sede)
    {
        $this->managers = $sede->coordinadores;
        $this->sede = $sede;
    }

    protected $rules = [
        'cedula' => 'required|numeric',

    ];

    public function render()
    {
        return view('livewire.add-manager-to-sede');
    }

    public function addManager()
    {
        $this->validate();
        //$this->reset();
        $this->user = User::where('cedula', $this->cedula)->first();
        if ($this->user) {
            $this->user->coordina()->sync([$this->sede->id=>['rol'=>'manager']]);
            $this->sede = $this->sede->refresh();
            $this->managers = $this->sede->coordinadores;
            $this->reset('cedula');
            $this->cedula=null;
            $this->user->assignRole('admin');
        $this->user->rol='admin';
        $this->user->save();
            $this->render();
        } else {
            dd('FALLA');
        }
        return true;
    }

    public function delManager()
    {
        $this->validate();
        $this->user = User::where('cedula', $this->cedula)->first();
        if ($this->user) {
        $this->user->coordina()->detach([$this->sede->id]);
        $this->managers = $this->user->sedes;
        $this->sede = $this->sede->refresh();
        $this->managers = $this->sede->coordinadores;
        $this->cedula=33;
        $this->reset('cedula');
        $this->user->roles()->detach();
        $this->user->assignRole('no role');
        $this->user->rol='no role';
        $this->user->save();
        $this->render();
        } else {
            dd('FALLA');
        }
        return true;
    }
}
