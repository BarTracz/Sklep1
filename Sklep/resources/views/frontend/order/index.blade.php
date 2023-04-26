@extends('layouts.app')

@section('title', 'Order')

@section('content')

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets\css\order.css">
</head>
<body>

    <div class="py-3 py-md-4 checkout">
        <div class="container">
            <h4>{{ __('Checkout') }}</h4>
            <hr>

            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-dark">
                            {{ __('Item total amount') }} :
                            <span class="float-end">{{ $totalPrice }}$</span>
                        </h4>
                        <hr>
                        <small>* {{ __('Items will be delivered in 3 - 5 days') }}.</small>
                        <br/>
                        <small>* {{ __('Tax and other charges are included') }}?</small>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-dark">
                            {{ __('Basic information') }}
                        </h4>
                        <hr>

                        <form action="{{ url('order/store') }}" method="POST">
                        @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>{{ __('First Name') }}</label>
                                    <input type="text" name="firstname" class="form-control" placeholder="{{ __('Enter first name') }}" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>{{ __('Last Name') }}</label>
                                    <input type="text" name="lastname" class="form-control" placeholder="{{ __('Enter last name') }}" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>{{ __('Phone Number') }}</label>
                                    <input type="number" name="phone" class="form-control" placeholder="{{ __('Enter phone number') }}" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>{{ __('Zip-code') }}</label>
                                    <input type="text" name="zipcode" class="form-control" placeholder="{{ __('Enter zip-code') }}" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>{{ __('City') }}</label>
                                    <input type="text" name="city" class="form-control" placeholder="{{ __('Enter city') }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>{{ __('Street') }}</label>
                                    <input type="text" name="street" class="form-control" placeholder="{{ __('Enter street') }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>{{ __('House Number') }}</label>
                                    <input type="text" name="house" class="form-control" placeholder="{{ __('Enter house number') }}">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>{{ __('Select payment method') }}: </label>
                                    <div class="d-md-flex align-items-start">
                                        <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <button class="nav-link fw-bold bg-dark text-white" id="cashOnDeliveryTab-tab" data-bs-toggle="pill" data-bs-target="#cashOnDeliveryTab" type="button" role="tab" aria-controls="cashOnDeliveryTab" aria-selected="true">{{ __('Cash on delivery') }}</button>
                                        </div>
                                        <div class="tab-content col-md-9" id="v-pills-tabContent">
                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                            <div class="tab-pane fade" id="cashOnDeliveryTab" role="tabpanel" aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                                                <h6>{{ __('Cash on Delivery Mode') }}</h6>
                                                <hr/>
                                                <button type="submit" class="btn btn-primary bg-dark">{{ __('Place Order') }} ({{ __('Cash on Delivery') }})</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@endsection