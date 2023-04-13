@extends('layouts.app')

<head>
    <title>XD-KOM - Products</title>
    <meta name="description" content="XD-KOM Products. Search for pcs, mobiles, laptops, smartwatches and consoles.">
</head>

@section('content')

<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Our Products</h4>
            </div>
            <livewire:frontend.product.index :products="$products" :brands="$brands" :category_name="$category_name" />
        </div>
    </div>
</div>

@endsection