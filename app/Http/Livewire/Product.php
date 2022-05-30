<?php

namespace App\Http\Livewire;

use Livewire\Component;
// use App\Models\product_m;

class Product extends Component
{

    public $productos = [];
    public function render()
    {
        return view('livewire.product');
    }
}
