<div>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header"><h4>Brands</h4></div>
                <div class="card-body">
                    @if(gettype($brands)=='string')
                    <label class="d-block">
                        <input type="checkbox" value=" {{ $brands }}" /> {{ $brands }}
                    </label>
                    @else
                    @foreach ($brands as $brand)
                    <label class="d-block">
                        <input type="checkbox" value=" {{ $brand }}" /> {{ $brand }}
                    </label>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="row">
            @forelse($products as $productItem)
            <div class="col-md-3">
                <div class="product-card">
                    <div class="product-card-img">
                        @if ($productItem->quantity > 0)
                        <label class="stock bg-success">In Stock</label>
                        @else
                        <label class="stock bg-danger">Out of Stock</label>
                        @endif
                        @if ($productItem->productImages->count() > 0)
                        <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{ $productItem->name }}">
                        @endif
                    </div>
                    <div class="product-card-body">
                        <p class="product-brand"></p>
                        <h5 class="product-name">
                            <a href="">
                                {{ $productItem->name }}
                            </a>
                        </h5>
                        <div>
                            <span class="selling-price">${{ $productItem->price }}</span>
                            <span class="price-from-30-days">TU CENA SPRZED MIESIĄCA, OKOK?</span>
                        </div>
                        <div class="mt-2">
                            <a href="" class="btn btn1">Add To Cart</a>
                            <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                            <a href="{{ url('/collections/'.$productItem->category_name.'/'.$productItem->name)}}"
                                class="btn btn1"> View </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-md-12">
                <div class="p-2">
                    <h4>
                        No Products Available for {{ $product->category_name}}
                    </h4>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>