<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{

    public $category_name, $brands, $products;
    public $brandInputs = [];

    protected $querySearch = [
        'brandInputs' => ['except' => '', 'as' => 'brand'],
    ];

    function mount($brands,$category_name) {
        $this->category_name = $category_name;
        $this->brands = $brands;
    }

    public function render()
    {
        $this->products = Product::where('category_name', $this->category_name)
            ->when($this->brandInputs, function($q){
            $q->whereIn('brand_id', $this->brandInputs);
            })
            ->where('status','0')
            ->get();

        return view('livewire.frontend.product.index', [
            'products' => $this->products,
            'brands' => $this->brands
        ]);
    }
}
