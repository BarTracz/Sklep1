<?php

namespace App\Http\Livewire\Frontend\Product;


use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{
    public $product, $parameters, $attributes;

    public function addToWishList($productId)
    {
        if(Auth::check())
        {
            if(WIshlist::where('user_id',auth()->user()->id)->where('product_id', $productId)->exists())
            {
                session()->flash('message','Already added to wishlist');
                return false;
            }
            else
            {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);
                session()->flash('message',"Product added succesfully");
            }
        }
        else
        {
            session()->flash('message','Please login to continue');
            return false;
        }
    }
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
