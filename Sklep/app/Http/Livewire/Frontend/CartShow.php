<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartShow extends Component
{

    public $totalPrice;
    public function removeCartItem(Request $request, int $item_id) {

        $cart = session()->get('cart');
        unset($cart[$item_id]);

        $request->session()->put('cart', $cart);
        $request->session()->save();

       return false;
    }

    public function decrementQuantity(Request $request, $item_quantity, $item) {
        
        $product = Product::where('id', $item['id'])->first();

        $quantity = $item_quantity;

        if($quantity > 1) {
        $quantity--;
        }
        
        $cart = session()->get('cart');
        $cart[$item['id']] = [
            'product' => $product,
            'quantity' => $quantity,
            'price' => $item['price'] * $quantity
        ];
        $request->session()->put('cart', $cart);
        $request->session()->save();
        
    }

    public function incrementQuantity(Request $request, $item_quantity, $item) {

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

        $cart = session()->get('cart');
        $cart[$item['id']] = [
            'product' => $product,
            'quantity' => $quantity,
            'price' => $item['price'] * $quantity
        ];
        $request->session()->put('cart', $cart);
        $request->session()->save();

    }

    public function showCart(){
        dd(Session::get('cart'));
    }

    public function totalPrice(){
        $cart = Session::get('cart');
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
        $cart = Session::get('cart');
        $this->totalPrice = $this->totalPrice();
        
        return view('livewire.frontend.cart-show',[
            'cart' => $cart,
            'totalPrice' => $this->totalPrice,
        ]);
    }
}