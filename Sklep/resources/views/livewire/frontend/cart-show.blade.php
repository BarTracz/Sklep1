<div>
    <body>
        <div class="py-3 py-md-5 bg-light">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="shopping-cart">
                
                            <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Products</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>Price</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>Quantity</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>Remove</h4>
                                    </div>
                                </div>
                            </div>
                            
                            @if ($cart != null)
                            @foreach ($cart as $cartItem)
                            <div class="cart-item">
                                <div class="row">
                                    <div class="col-md-6 my-auto">
                                        <a href="">
                                            <label class="product-name">
                                            <img src="{{ $cartItem['product']->productImages[0]->image }}" class="product-shopping-image" style="width: 50px; height: 50px" alt="{{ $cartItem['product']->name }}">
                                                {{ $cartItem['product']->name  }}
                                            </label>
                                        </a>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <label class="price"> {{ $cartItem['product']->price }}$</label>
                                    </div>
                                    <div class="col-md-2 col-7 my-auto">
                                        <div class="quantity">
                                            <div class="input-group">
                                                <span class="btn btn1" wire:click="decrementQuantity({{ $cartItem['quantity'] }},{{ $cartItem['product'] }})"><i class="fa fa-minus"></i></span>
                                                <input type="text" value="{{ $cartItem['quantity'] }}" readonly class="input-quantity" />
                                                <span class="btn btn1" wire:click="incrementQuantity({{ $cartItem['quantity'] }},{{ $cartItem['product'] }})"><i class="fa fa-plus"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-5 my-auto">
                                        <div class="remove">
                                            <button type="button" wire:click="removeCartItem({{ $cartItem['product']->id }})" class="btn btn-danger btn-sm">
                                                <span wire:loading.remove wire:target="removeCartItem({{ $cartItem['product']->id }})">
                                                    <i class="fa fa-trash"></i> Remove
                                                </span>
                                                <span wire:loading wire:target="removeCartItem({{ $cartItem['product']->id }})">
                                                    <i class="fa fa-trash"></i> Removing
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                            @else
                                <h4>No items in Cart</h4>
                            @endif
                        </div>
                    </div>
                </div>

                <div class ="row">
                    <div class="col-md-8 mt-3">
                        
                    </div>
                    <div class="col-md-4 mt-3">
                    @if ($cart != null)
                        @if(count($cart) > 0)
                        <div class="shadow-sm bg-white p-3">
                            <h4>Total:
                                <span class="float-end">{{ $totalPrice }}$</span>
                            </h4>
                            <hr>
                            <a href="{{ url('/order')}}" class="btn btn-warning w-100">Checkout</a>
                        </div>
                        @endif
                    @endif
                    </div>
                </div>
            </div>
        </div>

</div>