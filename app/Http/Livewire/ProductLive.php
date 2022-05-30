<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\product;

class ProductLive extends Component
{

    public $products = [];
    public $description,$price;
    protected $rules = [
        'description' => 'required|min:6',
        'price' => 'required',
    ];
    public function render()
    {
         $this->products = product::all();
        return view('livewire.product-live');
    }

    public function save_product(){
        $p = new product();
        $p->description = $this->description;
        $p->price =  $this->price;
        // $p->id_type = 1;
        $p->save();
    }
}
