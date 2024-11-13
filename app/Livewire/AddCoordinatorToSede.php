<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Sede;
use App\Models\User;


class AddCoordinatorToSede extends Component
{
    public $cedula;
    public $user;
    public $sede;
    public $coordinators = [];

    public function mount(Sede $sede)
    {
        $this->coordinators = $sede->coordinadores;
        $this->sede = $sede;
    }

    protected $rules = [
        'cedula' => 'required|numeric',

    ];


    public function render()
    {
        return view('livewire.add-coordinator-to-sede');
    }

    public function addCoordinator()
    {
        $this->validate();
        //$this->reset();
        $this->user = User::where('cedula', $this->cedula)->first();
        if ($this->user) {
            $this->user->coordina()->sync([$this->sede->id => ['rol' => 'coordinator']]);
            $this->sede = $this->sede->refresh();
            $this->coordinators = $this->sede->coordinadores;
            $this->reset('cedula');
            $this->cedula = null;
            $this->user->assignRole('coordinator');
            $this->user->rol = 'coordinator';
            $this->user->save();
            $this->render();
        } else {
            dd('FALLA');
        }
        return true;
    }

    public function delCoordinator()
    {
        $this->validate();
        $this->user = User::where('cedula', $this->cedula)->first();
        if ($this->user) {
            $this->user->coordina()->detach([$this->sede->id]);
            $this->coordinators = $this->user->sedes;
            $this->sede = $this->sede->refresh();
            $this->coordinators = $this->sede->coordinadores;
            $this->cedula = 33;
            $this->reset('cedula');
            $this->user->roles()->detach();
            $this->user->assignRole('no role');
            $this->user->rol = 'no role';
            $this->user->save();
            $this->render();
        } else {
            dd('FALLA');
        }
        return true;
    }
}
