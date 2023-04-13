<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CartShow extends Component
{

    public $totalPrice;
    public function removeCartItem(int $item_id) {

        $cart = Cache::get('cart');
        unset($cart[$item_id]);

        Cache::put('cart', $cart);

       return false;
    }

    public function decrementQuantity($item_quantity, $item) {
        
        $product = Product::where('id', $item['id'])->first();

        $quantity = $item_quantity;

        if($quantity > 1) {
        $quantity--;
        }
        
        Cache::get('cart');
        $cart[$item['id']] = [
            'product' => $product,
            'quantity' => $quantity,
            'price' => $item['price'] * $quantity
        ];
        Cache::put('cart', $cart);
        
    }

    public function incrementQuantity($item_quantity, $item) {

        $product = Product::where('id', $item['id'])->first();

        $quantity = $item_quantity;

        if($quantity < 5 ) {
            if($quantity < $product->quantity){
            $quantity++;
            }
            else{
                $this->dispatchBrowserEvent('message', [
                    'text' => 'No more products in stock',
                    'type' => 'info',
                    'status' => 401
                ]);
            }
        }

        $cart = Cache::get('cart');
        $cart[$item['id']] = [
            'product' => $product,
            'quantity' => $quantity,
            'price' => $item['price'] * $quantity
        ];
        Cache::put('cart', $cart);

    }

    public function showCart(){
        dd(Cache::get('cart'));
    }

    public function totalPrice(){
        $cart = Cache::get('cart');
        $this->totalPrice=0;

        if($cart != null){
            foreach($cart as $item){
                $this->totalPrice += $item['price'];
            }
        }

        return $this->totalPrice;
    }

    public function render()
    {
        $cart = Cache::get('cart');
        $this->totalPrice = $this->totalPrice();
        
        return view('livewire.frontend.cart-show',[
            'cart' => $cart,
            'totalPrice' => $this->totalPrice,
        ]);
    }
}