<?php

namespace App\Livewire;

use Livewire\Component;

class ListBanner extends Component
{
    public $type = '';

    public $banners;

    public function mount(Lesson $lesson)
    {
        $this->type = 'type 1';

        $this->banners = Banner::where('banners.type', $this->type)->get();
    }



    public function render()
    {
        return view('livewire.list-banner');
    }
}
