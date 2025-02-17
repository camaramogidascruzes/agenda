<?php

namespace App\Livewire;

use Livewire\Attributes\Reactive;
use Livewire\Component;

class Agenda extends Component
{
    public $data = 17;



    public function render()
    {
        return view('livewire.agenda', ['data' => $this->data]);
    }
}
