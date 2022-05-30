<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Controllers\advisesController;

class AdviseLive extends Component
{

    public $information;
    public $codigo_asesor;
    public function render()
    {
        // $codigo_asesor = "C001";
        $a = new advisesController();
        $this->information = (array) $a->process_data($this->codigo_asesor);
            return view('livewire.advise-live');


    }
}
