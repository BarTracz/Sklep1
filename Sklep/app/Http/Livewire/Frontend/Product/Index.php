<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class Index extends Component
{

    public $products;
    public $brands;

    function mount($products,$brands) {
        // 9 minuta cos trzeba podkminić
        $this->products = $products;
        $this->brands = $brands;
    }

    public function render()
    {
        return view('livewire.frontend.product.index', [
            'products' => $this->products,
            'brands' => $this->brands
        ]);
    }
}
