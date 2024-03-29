<div>
    <div class="brands">            
                <div class="card">
                    <div class="card-header"><h5>{{ __('Brands') }}</h5></div>
                    <div class="card-body">
                        @foreach ($brands as $brand)
                        <label class="d-block">
                            <input type="checkbox" wire:model="brandInputs" value="{{ $brand['id'] }}" /> {{ $brand['name'] }}
                        </label>
                        @endforeach
                    </div>
                </div>
                <div class="card">
                    <div class="card-header"><h5>{{ __('Price') }}</h5></div>
                    <div class="card-body">
                        <label class="d-block">
                            <input type="radio" name="priceSort" wire:model="priceInput" value="high-to-low" style="margin-right: 2px;"/>{{ __('High to low') }}
                        </label>
                        <label class="d-block">
                            <input type="radio" name="priceSort" wire:model="priceInput" value="low-to-high" style="margin-right: 2px;"/>{{ __('Low to high') }}
                        </label>
                    </div>
                </div>
            

    </div>
    <div>

        <div class="row">
            @forelse($products as $productItem)
            
                <div class="product-card">
                    <div class="product-card-img">
                        @if ($productItem->quantity > 0)
                        <label class="stock bg-success">{{ __('In stock') }}</label>
                        @else
                        <label class="stock bg-danger">{{ __('Out of stock') }}</label>
                        @endif
                        @if ($productItem->productImages->count() > 0)
                        <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{ $productItem->name }}">
                        @endif
                    </div>
                    <div class="product-card-body">
                        <p class="product-brand"></p>
                        <h5 class="product-name">
                            <strong>
                                {{ $productItem->name }}
                            </strong>
                        </h5>
                        <div>
                            <span class="selling-price">${{ $productItem->price }}</span>
                        </div>
                        <div>
                            @php
                                $lowest_price_from_30_days = 0;
                                $lowest_price_from_30_days = $productItem->Old_price->min('price');
                            @endphp
                            @if($lowest_price_from_30_days>0 && $productItem->isOnSale==1)
                            <span class="price-from-30-days">Lowest price from 30 days before sale: ${{ $lowest_price_from_30_days }}</span>
                            @endif
                        </div>
                        <div class="mt-2">
                            <a href="{{ url('/collections/'.$productItem->category_name.'/'.$productItem->id)}}"
                                class="btn btn1">{{ __('View') }}</a>
                        </div>
                    </div>
                </div>
            
            @empty
            <div class="col-md-12">
                <div class="p-2">
                    <h4>
                        {{ __('No products available for') }} {{ $category_name }}
                    </h4>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>