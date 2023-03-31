@extends('layouts.app')

@section('title', 'Home Page')

@section('content')

<!-- <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
    <div class="carousel-inner">

        @foreach ($sliders as $key => $sliderItem)

        <div class="carousel-item {{ $key == '0' ? 'active':'' }}">
            @if($sliderItem->image)
            <img src="{{ asset("$sliderItem->image")}}" class="d-block w-100" style="height:800px" alt="...">
            @endif
            <div class="carousel-caption d-none d-md-block">
                <div class="custom-carousel-content">
                <h1>{!! $sliderItem->title !!}</h1>

                <p>{!! $sliderItem->description !!}</p>

                <div>
                    <a href="#" class="btn btn-slider">
                        Check price
                    </a>
                </div>

            </div>
        </div>
        </div>
        @endforeach

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
</div> -->

<div class="content">

    <div class="d-flex carousel-nav">
        <a href="#" class="col active">First Tab</a>
        <a href="#" class="col">Second Tab</a>
        <a href="#" class="col">Third Tab</a>
        <a href="#" class="col">Forth Tab</a>
        <a href="#" class="col">Fifth Tab</a>
      </div>


    <div class="container">
        <div class="owl-carousel owl-1">
            @foreach ($sliders as $key => $sliderItem)

            <div class="media-29101 d-md-flex w-100">
                <div class="img">
                    <img src="{{ asset("$sliderItem->image")}}" alt="Image" class="img-fluid">
                </div>
                <div class="text">
                    <a class="category d-block mb-4" href="#">{!! $sliderItem->title !!}</a>
                    <h2><a href="#">{!! $sliderItem->description !!}</p>
                </div>
            </div> <!-- .item -->

            @endforeach
        </div>
    </div>
</div>

@endsection