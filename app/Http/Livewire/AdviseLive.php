<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Controllers\advisesController;

class AdviseLive extends Component
{

    public $information;
    public function render()
    {
        $a = new advisesController();
        $this->information = (array) $a->process_data();
        return view('livewire.advise-live');
    }
}
