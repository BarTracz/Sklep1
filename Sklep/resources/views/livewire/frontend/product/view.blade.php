<div>
<div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">
                        @if ($product->productImages->count() > 0)
                        <img src="{{ asset($product->productImages[0]->image) }}" alt="{{ $product->name }}">
                        @endif
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{ $product->name }}
                            <label class="label-stock bg-success">In Stock</label>
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / Category / Product / HP Laptop
                        </p>
                        <div>
                            <span class="selling-price">${{ $product->price }}</span>
                            <span class="original-price">$499</span>
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1"><i class="fa fa-minus"></i></span>
                                <input type="text" value="1" class="input-quantity" />
                                <span class="btn btn1"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <a href="" class="btn btn1"> <i class="fa fa-shopping-cart"></i> Add To Cart</a>
                            <a href="" class="btn btn1"> <i class="fa fa-heart"></i> Add To Wishlist </a>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Parameters</h5>
                            <p>
                                @php
                                $count = count($attributes);
                                $i = 1;
                                @endphp

                                <!-- His palms are sweaty, knees weak, arms are heavy
                                There's vomit on his sweater already, mom's spaghetti -->
                                <!--Foreach $key - nazwa i $value - wartość, ucfirst i str_replace modyfikacja wyświetlanego tekstu -->
                                @foreach ($attributes as $k => $v)
                                @if($i > 2 && $i < $count-1)
                                    @if(($k == 'disk_size' or $k == 'disk1_size' or $k == 'disk2_size' or $k == 'memory_size' or $k == 'ram_size') && $v % 1024 == 0)
                                    @php $v = $v/1024 @endphp
                                    <b>{{ ucfirst(str_replace('_', ' ',$k)) }}</b> - {{ $v }} TB<br />
                                    @elseif(($k == 'disk_size' or $k == 'disk1_size' or $k == 'disk2_size' or $k == 'memory_size' or $k == 'ram_size') && $v % 1024 != 0)
                                    <b>{{ ucfirst(str_replace('_', ' ',$k)) }}</b> - {{ $v }} GB<br />
                                    @elseif(($k == 'controller_number' && $v == 1))
                                    <b>{{ ucfirst(str_replace('_', ' ',$k)) }}</b> - {{ $v }} pc<br />
                                    @elseif(($k == 'controller_number' && $v > 1))
                                    <b>{{ ucfirst(str_replace('_', ' ',$k)) }}</b> - {{ $v }} pcs<br />
                                    @elseif(($k == 'display_size'))
                                    <b>{{ ucfirst(str_replace('_', ' ',$k)) }}</b> - {{ $v }}"<br />
                                    @else
                                    <b>{{ ucfirst(str_replace('_', ' ',$k)) }}</b> - {{ $v }} <br />
                                    @endif
                                    @php $i++ @endphp
                                @else @php $i++ @endphp
                                @endif
                                @endforeach
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
                                {{ $product->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
