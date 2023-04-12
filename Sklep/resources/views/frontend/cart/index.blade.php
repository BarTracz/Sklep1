@extends('layouts.app')

<head>
    <title>XD-KOM - {{ __('Your cart') }}</title>
</head>

@section('title', 'Cart')

@section('content')

    <livewire:frontend.cart-show />

@endsection