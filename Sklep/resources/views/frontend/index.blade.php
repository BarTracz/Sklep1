@extends('layouts.app')

@section('title', 'Home Page')

@section('content')

<div class="content">

    <div class="d-flex carousel-nav">
        @foreach ($sliders as $key => $sliderItem)
        <a class="col">{!! $sliderItem->title !!}</a>
        @endforeach
    </div>

    <div class="container">
        <div class="owl-carousel owl-1">
            @foreach ($sliders as $key => $sliderItem)
            <div class="media-29101 d-md-flex w-100">
                <div class="img">
                    <img src="{{ asset("$sliderItem->image") }}" alt="Image" class="img-fluid">
                </div>
                <div class="text">
                    <a class="category d-block mb-4">{!! $sliderItem->title !!}</a>
                    <h2><a>{!! $sliderItem->description !!}</p></h2>
                    <a href="{{ asset("$sliderItem->reference") }}" class="btn btn-outline-dark btn-lg" role="button" aria-pressed="true">Check</a>
                </div>
            </div> <!-- .item -->
            @endforeach
        </div>
    </div>

</div>

@endsection