<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class View extends Component
{
    public $product, $parameters, $attributes;
    public function mount($product,$parameters,$attributes)
    {
        $this->product = $product;
        $this->parameters = $parameters;
        $this->attributes = $attributes;
    }

    public function render()
    {
        return view('livewire.frontend.product.view',[
            'product' => $this->product,
            'parameters' => $this->parameters,
            'attributes' => $this->attributes,
        ]);
    }
}
