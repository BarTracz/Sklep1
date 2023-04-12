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
                                        <h4>{{ __('Products') }}</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>{{ __('Price') }}</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>{{ __('Status') }}</h4> <!-- czy item jest dostępny -->
                                    </div>
                                    <div class="col-md-2">
                                        <h4>{{ __('Remove') }}</h4>
                                    </div>
                                </div>
                            </div>

                            @forelse ($wishlist as $wishlistItem)
                            @if ($wishlistItem->product)
                            <div class="cart-item">
                                <div class="row">
                                    <div class="col-md-6 my-auto">
                                        <a href="{{ url('collections/'.$wishlistItem->product->category_name.'/'.$wishlistItem->product->id) }}">
                                            <label class="product-name">
                                                <img src="{{ $wishlistItem->product->productImages[0]->image }}" class="product-shopping-image" style="width: 50px; height: 50px" alt="{{ $wishlistItem->product->name }}">
                                                {{ $wishlistItem->product->name }}
                                            </label>
                                        </a>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <label class="price"> ${{ $wishlistItem->product->price }} </label>
                                    </div>
                                    <div class="col-md-2 col-7 my-auto">
                                            @if ($wishlistItem->product->quantity > 0)
                                                <label class="status success"> {{ __('Available') }} </label>    
                                            @else
                                                <label class="status danger"> {{ __('Not available') }} </label>
                                            @endif
                                    </div>
                                    <div class="col-md-2 col-5 my-auto">
                                        <div class="remove">
                                            <button type="button" wire:click="removeWishlistItem({{ $wishlistItem->id }})" class="btn btn-danger btn-sm">
                                                <span wire:loading.remove wire:target="removeWishlistItem({{ $wishlistItem->id }})">
                                                    <i class="fa fa-trash"></i> {{ __('Remove') }}
                                                </span>
                                                <span wire:loading wire:target="removeWishlistItem({{ $wishlistItem->id }})">
                                                    <i class="fa fa-trash"></i> {{ __('Removing') }}
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @empty
                                <h4>{{ __('No items in wishlist') }}</h4>
                            @endforelse
                        </div>
                    </div>
                </div>

            </div>
        </div>
</div>