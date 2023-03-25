@extends('layouts.app')


@section('content')

<div>
    <livewire:frontend.product.view :product="$product" :parameters="$parameters" :attributes="$attributes" :lowest_price_from_30_days="$lowest_price_from_30_days" />
</div>

@endsection