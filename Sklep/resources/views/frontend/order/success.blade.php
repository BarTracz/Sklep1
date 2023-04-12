@extends('layouts.app')


@section('content')

<div class="container text-center">
    <h1 class="p-5">{{ __('Order placed successfully!') }}</h4>
    <span>{{ __('Your order will be delivered in about 3-5 business days') }}.</span>
</div>

@endsection