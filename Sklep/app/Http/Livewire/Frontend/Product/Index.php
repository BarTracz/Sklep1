<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class Index extends Component
{

    public $products;

    function mount($products) {
        // 9 minuta cos trzeba podkminić
        $this->products = $products;
    }

    public function render()
    {
        return view('livewire.frontend.product.index', [
            'products' => $this->products
        ]);
    }
}
