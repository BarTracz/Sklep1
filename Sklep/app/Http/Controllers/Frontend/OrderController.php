<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\OrderFormRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderList;

class OrderController extends Controller
{
    protected $totalPrice, $firstname, $lastname, $phone, $zipcode, $city, $street, $house;

    public function totalPrice(){
        $cart = Session::get('cart');
        $this->totalPrice=0;

        foreach($cart as $item){
            $this->totalPrice += $item['price'];
        }

        return $this->totalPrice;
    }

    public function store(OrderFormRequest $request){
        $validatedData = $request->validated();
        $cart = Session::get('cart');
        $totalPrice=0;

        foreach($cart as $item){
            $totalPrice += $item['price'];
        }


        $order = new Order();

        $order->user_id = auth()->user()->id;
        $order->Name = $validatedData['firstname'];
        $order->Surname = $validatedData['lastname'];
        $order->zip_code = $validatedData['zipcode'];
        $order->city = $validatedData['city'];
        $order->street = $validatedData['street'];
        $order->house_number = $validatedData['house'];
        $order->phone_number = $validatedData['phone'];
        $order->total_price = $totalPrice;

        $order->save();
        

        foreach($cart as $item){
            $order_list = new OrderList();

            $order_list->order_id = $order->id;
            $order_list->product_id = $item['product']->id;

            $product = Product::where('id', $item['product']->id)->first();
            $product->quantity = $product->quantity - $item['quantity'];

            $product->save();
            $order_list->save();

        }

        return redirect('/order/success');
    }

    public function index() {

        $this->totalPrice = $this->totalPrice();

        return view('frontend.order.index',[
            'totalPrice' => $this->totalPrice,
        ]);
    }

    public function success() {

        return view('frontend.order.success');
    }
}
