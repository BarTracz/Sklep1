<?php

namespace App\Http\Livewire\Frontend\Product;


use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{
    public $product, $parameters, $attributes, $quantityCount = 1;

    public function addToWishList($productId)
    {
        if(Auth::check())
        {
            if(WIshlist::where('user_id',auth()->user()->id)->where('product_id', $productId)->exists())
            {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Already added to wishlist',
                    'type' => 'warning',
                    'status' => 409
                ]);
                return false;
            }
            else
            {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);
                $this->emit('wishlistAddedUpdated');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product added succesfully',
                    'type' => 'success',
                    'status' => 200
                ]);
                return false;
            }
        }
        else
        {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Login to continue',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
        }
    }

    public function decrementQuantity() {
        if($this->quantityCount > 1) {
        $this->quantityCount--;
        }
    }

    public function incrementQuantity() {
        if($this->quantityCount < 10) {
        $this->quantityCount++;
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
