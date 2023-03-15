<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{

    public $category_name, $brands, $products, $priceInput;
    public $brandInputs = [];

    protected $querySearch = [
        'brandInputs' => ['except' => '', 'as' => 'brand'],
        'priceInput' => ['except' => '', 'as' => 'price'],
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
            ->when($this->priceInput, function($q){
                $q->when($this->priceInput == "high-to-low", function($q2){
                    $q2->orderBy('price','DESC');
                    });
                $q->when($this->priceInput == "low-to-high", function($q2){
                    $q2->orderBy('price','ASC');
                    });
                })
            ->where('status','0')
            ->get();

        return view('livewire.frontend.product.index', [
            'products' => $this->products,
            'brands' => $this->brands
        ]);
    }
}
