<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class View extends Component
{
    public $product, $parameters;
    public function mount($product,$parameters)
    {
        $this->product = $product;
        $this->parameters = $parameters;
    }

    public function render()
    {
        return view('livewire.frontend.product.view',[
            'product' => $this->product,
            'parameters' => $this->parameters,
        ]);
    }
}
