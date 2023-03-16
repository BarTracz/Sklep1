@extends('layouts.app')


@section('content')

<div>
    <livewire:frontend.product.view :product="$product" :parameters="$parameters" :attributes="$attributes" />
</div>

@endsection