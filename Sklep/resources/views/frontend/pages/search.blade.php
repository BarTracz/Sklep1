@extends('layouts.app')

@section('title', 'Search')

@section('content')

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Search Results</h4>
                <div class="underline mb-4"></div>
            </div>

            @forelse ($searchProducts as $productItem)
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
                        
                            {{ $productItem->name }}
                        
                    </h5>
                    <div>
                        <span class="selling-price">${{ $productItem->price }}</span>
                        <span class="price-from-30-days">TU CENA SPRZED MIESIĄCA, OKOK?</span>
                    </div>
                    <div class="mt-2">
                        <a href="{{ url('/collections/'.$productItem->category_name.'/'.$productItem->id)}}"
                            class="btn btn1"> View </a>
                    </div>
                </div>
            </div>

            @empty
            <div class="col-md-12 p-2">
                <h4>No Products Found</h4>
            </div>
            @endforelse

            <div class="col-md-10">
                {{ $searchProducts->appends(request()->input())->links() }}
            </div>

        </div>
    </div>
</div>

@endsection