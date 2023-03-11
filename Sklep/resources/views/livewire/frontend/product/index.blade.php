<div>
    <div class="row">
        <div class="col-md-3">
            @if($category->brands)
            <div class="card">
                <div class="card-header"><h4>Brands</h4></div>
                <div class="card-body">
                    @foreach ($category->brands as $brandItem)
                    <label class="d-block">
                        <input type="checkbox" wire:model="brandInputs" value="{{$brandItem->name}}" /> {{$brandItem->name}}
                    </label>
                    @endforeach
                </div>
            </div>
            @endif

            <div class="card mt-3">
                <div class="card-header"><h4>Price</h4></div>
                <div class="card-body">
                    <label class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInputs" value="highest-to-lowest" /> Highest to Lowest
                    </label>
                    <label class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInputs" value="lowest-to-highest" /> Lowest to Highest
                    </label>
                </div>
            </div>

        </div>
        <div class="col-md-9">
            <div class="row">
                @forelse ($products as $productItem)
                    <div class="col-md-4">
                        <div class="product-card">
                            <div class="product-card-img">
                                @if($productItem->status = 1)
                                    <label class="stock bg-success">Available</label>
                                @else
                                    <label class="stock bg-danger">Unavailable</label>
                                @endif
                                
                                @if($productItem->productImages->count() > 0)
                                    <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                    <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{$productItem->name}}">
                                    </a>
                                @endif
                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $productItem->brand }}</p>
                                <h5 class="product-name">
                                    <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                        {{ $productItem->name }}
                                    </a>
                                </h5>
                                <div>
                                    <span class="selling-price">{{ $productItem->price }} zł</span>
                                </div>
                @empty
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No Products Available for {{ $category->name }}</h4>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
