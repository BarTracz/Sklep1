<div>
<div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">
                        @if ($product->productImages)
                        <img src="{{ asset($product->productImages[0]->image) }}" class="w-100" alt="Img">
                        @else
                        No Image Available
                        @endif
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{ $product -> name}}
                            <label class="label-stock bg-success">Available</label>
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{ $product->category->name }} / {{ $product->name }}
                        </p>
                        <div>
                            <span class="selling-price">{{ $product->price }} zł</span>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Small Description</h5>
                            <p>
                                {!! $product->small_description !!}
                            </p>
                            <p>
                                <h1>Contact number: {!! $product->contact_number !!}</h1>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>
                            {!! $product->description !!}
                            </p>
                        </div>

                        <div class="card-header bg-white">
                        </div>
                        <div class="card-body">
                            <p>
                                <b>Brand: </b>{!! $product->brand !!}
                            </p>
                            <p>
                                <b>Model: </b>{!! $product->model !!}
                            </p>
                            <p>
                                <b>Generation: </b>{!! $product->generation !!}
                            </p>
                            <p>
                                <b>Version: </b>{!! $product->version !!}
                            </p>
                            <p>
                                <b>Production year: </b>{!! $product->production_year !!}
                            </p>
                            <p>
                                <b>Mileage: </b>{!! $product->mileage !!} KM
                            </p>
                            <p>
                                <b>Engine volume: </b>{!! $product->engine_volume !!}cc
                            </p>
                            <p>
                                <b>Horse power: </b>{!! $product->hp !!} HP
                            </p>
                            <p>
                                <b>Fuel type: </b>
                                @if ($product->fuel_type_id == 1)  Gasoline 
                                @elseif ($product->fuel_type_id == 2) Diesel
                                @elseif ($product->fuel_type_id == 3) Electric
                                @elseif ($product->fuel_type_id == 4)  Hybrid 
                                @elseif ($product->fuel_type_id == 5)  Hydrogen
                                @elseif ($product->fuel_type_id == 6)  Ethanol
                                @endif
                            </p>
                            <p>
                                <b>Fuel consumption: </b>{!! $product->fuel_consumption !!} L/100KM
                            </p>
                            <p>
                                <b>Drive: </b>
                                @if ($product->drive_id == 1) FWD
                                @elseif ($product->drive_id == 2) RWD
                                @elseif ($product->drive_id == 3) 4WD
                                @elseif ($product->drive_id == 4) AWD
                                @endif
                            </p>
                            <p>
                                <b>Gearbox: </b>
                                @if ($product->gearbox_type_id == 1) Manual
                                @else Automatic
                                @endif
                            </p>
                            <p>
                                <b>Doors: </b>{!! $product->doors !!}
                            </p>
                            <p>
                                <b>Seats: </b>{!! $product->seats !!}
                            </p>
                            <p>
                                <b>Color: </b>{!! $product->color !!}
                            </p>
                            <p>
                                <b>Color type: </b>
                                @if ($product->color_type_id == 1) Solid
                                @elseif ($product->color_type_id == 2) Metalic
                                @elseif ($product->color_type_id == 3) Pearlescent
                                @elseif ($product->color_type_id == 4) Matte
                                @elseif ($product->color_type_id == 4) Special
                                @endif
                            </p>
                            <p>
                                <b>Accident: </b>{!! $product->accident == '1' ? 'Yes':'No'!!}
                            </p>
                            <p>
                                <b>Condition: </b>{!! $product->condition !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>