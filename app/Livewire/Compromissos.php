<?php

namespace App\Livewire;

use App\Models\CompromissoPublico;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class Compromissos extends Component
{
    public $data;
    public $data_selecionada;

    public function mount()
    {
        $this->data_selecionada = Carbon::now()->translatedFormat('l\\, d \\de F \\de Y');

        $this->data =  CompromissoPublico::query()->whereDate('data', '=', Carbon::now())->orderBy('hora', 'asc')->get();
    }

    #[On('setData')]
    public function setData($data)
    {
        $filterdata = Carbon::parse($data)->format('Y-m-d');
        $this->data_selecionada = Carbon::parse($data)->translatedFormat('l\\, d \\de F \\de Y');

        $this->data =  CompromissoPublico::query()->whereDate('data', '=', $filterdata)->orderBy('hora', 'asc')->get();

    }

    public function render()
    {
        return view('livewire.compromissos');
    }
}
