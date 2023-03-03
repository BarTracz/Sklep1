@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Product
                    <a href="{{ url('admin/products') }}" class="btn btn-danger btn-sm text-white float-end">
                        BACK
                    </a>
                </h3>
            </div>
            <div class="card-body" id="card-body">
                <form action="{{ url('admin/products/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                        <div class="row">
                            <div class="col-md-4">    
                                <div class="mb-3 mt-3">
                                    <label>Category</label>
                                    <select name="category_name" id="selector" class="form-control" onchange="category()">
                                        <option value="default">-</option>
                                        <option value="pcs">PC</option>
                                        <option value="laptops">Laptop</option>
                                        <option value="mobiles">Mobile</option>
                                        <option value="consoles">Console</option>
                                        <option value="smartwatches">Smartwatch</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 mt-3">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ $product->name }}" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 mt-3">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control">{{ $product->description }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Price</label>
                                    <input type="number" name="price" value="{{ $product->price }}" step="0.01" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Quantity</label>
                                    <input type="number" name="quantity" value="{{ $product->quantity }}" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Brand</label>
                                    <select name="brand_id" class="form-control">
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}" {{ $brand->name == $product->brand ? 'selected':'' }}>
                                            {{ $brand->name }}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Status</label><br/>
                                    <input type="checkbox" name="status" {{ $product->status == '1' ? 'checked':'' }} style="width: 50px; height: 50px;"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Trending</label><br/>
                                    <input type="checkbox" name="trending" {{ $product->trending == '1' ? 'checked':'' }} style="width: 50px; height: 50px;"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Upload product images</label>
                                    <input type="file" name="image[]" multiple class="form-control" />
                                </div>
                                <div>
                                    @if($product->productImages)
                                    <div class="row">
                                        @foreach ($product->productImages as $image)
                                        <div class="col-md-2">
                                            <img src="{{ asset($image->image) }}" style="width: 80px;height: 80px;" class="me-4 border" alt="img" />
                                        <a href="{{ url('admin/product-image/'.$image->id.'/delete') }}" class="d-block">Remove</a>
                                        </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    @else
                                    <h5>No image uploaded</h5>
                                    @endif
                                </div>
                            </div>
                            <div id="details">
                                <script type="text/javascript">
                                    function category(){
                                        var selected = document.getElementById("selector").value;
                                        switch (selected){
                                            case 'pcs':
                                                document.getElementById('details').innerHTML = 
                                                '<div class="row">\
                                                <div class="col-md-4">\
                                                    <div class="mb-3">\
                                                        <label>OS</label>\
                                                        <input type="text" name="os" class="form-control"/>\
                                                    </div>\
                                                </div>\
                                                <div class="col-md-4">\
                                                    <div class="mb-3">\
                                                        <label>CPU</label>\
                                                        <input type="text" name="cpu" class="form-control"/>\
                                                    </div>\
                                                </div>\
                                                <div class="col-md-4">\
                                                    <div class="mb-3">\
                                                        <label>GPU</label>\
                                                        <input type="text" name="gpu" class="form-control"/>\
                                                    </div>\
                                                </div>\
                                                <div class="col-md-4">\
                                                    <div class="mb-3">\
                                                        <label>RAM Type</label>\
                                                        <input type="text" name="ram_type" class="form-control"/>\
                                                    </div>\
                                                </div>\
                                                <div class="col-md-4">\
                                                    <div class="mb-3">\
                                                        <label>RAM Size</label>\
                                                        <input type="number" name="ram_size" class="form-control"/>\
                                                    </div>\
                                                </div>\
                                                <div class="col-md-4">\
                                                    <div class="mb-3">\
                                                        <label>Disk1 Type</label>\
                                                        <input type="text" name="disk1_type" class="form-control"/>\
                                                    </div>\
                                                </div>\
                                                <div class="col-md-4">\
                                                    <div class="mb-3">\
                                                        <label>Disk1 Size</label>\
                                                        <input type="number" name="disk1_size" class="form-control"/>\
                                                    </div>\
                                                </div>\
                                                <div class="col-md-4">\
                                                    <div class="mb-3">\
                                                        <label>Disk2 Type</label>\
                                                        <input type="text" name="disk2_type" class="form-control"/>\
                                                    </div>\
                                                </div>\
                                                <div class="col-md-4">\
                                                    <div class="mb-3">\
                                                        <label>Disk2 Size</label>\
                                                        <input type="number" name="disk2_size" class="form-control"/>\
                                                    </div>\
                                                </div>\
                                                </div>';
                                                break;
                                            case 'laptops':
                                                document.getElementById('details').innerHTML = 
                                                '<div class="row">\
                                                <div class="col-md-4">\
                                                    <div class="mb-3">\
                                                        <label>OS</label>\
                                                        <input type="text" name="os"  class="form-control"/>\
                                                    </div>\
                                                </div>\
                                                <div class="col-md-4">\
                                                    <div class="mb-3">\
                                                        <label>CPU</label>\
                                                        <input type="text" name="cpu" class="form-control"/>\
                                                    </div>\
                                                </div>\
                                                <div class="col-md-4">\
                                                    <div class="mb-3">\
                                                        <label>GPU</label>\
                                                        <input type="text" name="gpu" class="form-control"/>\
                                                    </div>\
                                                </div>\
                                                <div class="col-md-4">\
                                                    <div class="mb-3">\
                                                        <label>RAM Type</label>\
                                                        <input type="text" name="ram_type" class="form-control"/>\
                                                    </div>\
                                                </div>\
                                                <div class="col-md-4">\
                                                    <div class="mb-3">\
                                                        <label>RAM Size</label>\
                                                        <input type="number" name="ram_size" class="form-control"/>\
                                                    </div>\
                                                </div>\
                                                <div class="col-md-4">\
                                                    <div class="mb-3">\
                                                        <label>Disk1 Type</label>\
                                                        <input type="text" name="disk1_type" class="form-control"/>\
                                                    </div>\
                                                </div>\
                                                <div class="col-md-4">\
                                                    <div class="mb-3">\
                                                        <label>Disk1 Size</label>\
                                                        <input type="number" name="disk1_size" class="form-control"/>\
                                                    </div>\
                                                </div>\
                                                <div class="col-md-4">\
                                                    <div class="mb-3">\
                                                        <label>Disk2 Type</label>\
                                                        <input type="text" name="disk2_type" class="form-control"/>\
                                                    </div>\
                                                </div>\
                                                <div class="col-md-4">\
                                                    <div class="mb-3">\
                                                        <label>Disk2 Size</label>\
                                                        <input type="number" name="disk2_size" class="form-control"/>\
                                                    </div>\
                                                </div>\
                                                <div class="col-md-4">\
                                                    <div class="mb-3">\
                                                        <label>Display Size</label>\
                                                        <input type="number" name="display_size" step="0.01" class="form-control"/>\
                                                    </div>\
                                                </div>\
                                                </div>';
                                                break;
                                            case 'mobiles':
                                                document.getElementById('details').innerHTML = 
                                                '<div class="row">\
                                                <div class="col-md-4">\
                                                    <div class="mb-3">\
                                                        <label>OS</label>\
                                                        <input type="text" name="os" class="form-control"/>\
                                                    </div>\
                                                </div>\
                                                <div class="col-md-4">\
                                                    <div class="mb-3">\
                                                        <label>RAM Size</label>\
                                                        <input type="number" name="ram_size" class="form-control"/>\
                                                    </div>\
                                                </div>\
                                                <div class="col-md-4">\
                                                    <div class="mb-3">\
                                                        <label>Memory Size</label>\
                                                        <input type="number" name="memory_size" class="form-control"/>\
                                                    </div>\
                                                </div>\
                                                <div class="col-md-4">\
                                                    <div class="mb-3">\
                                                        <label>Display Size</label>\
                                                        <input type="number" name="display_size" step="0.01" class="form-control"/>\
                                                    </div>\
                                                </div>\
                                                </div>';
                                                break;
                                            case 'consoles':
                                                document.getElementById('details').innerHTML = 
                                                '<div class="row">\
                                                <div class="col-md-4">\
                                                    <div class="mb-3">\
                                                        <label>Type</label>\
                                                        <input type="text" name="type" class="form-control"/>\
                                                    </div>\
                                                </div>\
                                                <div class="col-md-4">\
                                                    <div class="mb-3">\
                                                        <label>Disk Size</label>\
                                                        <input type="number" name="disk_size" class="form-control"/>\
                                                    </div>\
                                                </div>\
                                                <div class="col-md-4">\
                                                    <div class="mb-3">\
                                                        <label>Controller number</label>\
                                                        <input type="number" name="controller_number" class="form-control"/>\
                                                    </div>\
                                                </div>\
                                                </div>';
                                                break;
                                            case 'smartwatches':
                                                document.getElementById('details').innerHTML = 
                                                '<div class="row">\
                                                <div class="col-md-4">\
                                                    <div class="mb-3">\
                                                        <label>Display size</label>\
                                                        <input type="number" name="display_size" step="0.01" class="form-control"/>\
                                                    </div>\
                                                </div>\
                                                <div class="col-md-4">\
                                                    <div class="mb-3">\
                                                        <label>OS</label>\
                                                        <input type="text" name="os" class="form-control"/>\
                                                    </div>\
                                                </div>\
                                                <div class="col-md-4">\
                                                    <div class="mb-3">\
                                                        <label>has_gps</label><br/>\
                                                        <input type="checkbox" name="has_gps" style="width: 50px; height: 50px;" />\
                                                    </div>\
                                                </div>\
                                                <div class="col-md-4">\
                                                    <div class="mb-3">\
                                                        <label>Connection Type</label>\
                                                        <input type="text" name="connection_type" class="form-control"/>\
                                                    </div>\
                                                </div>\
                                                </div>';
                                                break;
                                        }
                                    }
                                </script>
                            </div>
                        </div>  
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" >Edit</button>
            </div>
            </form> 
        </div>
    </div>        
</div>

@endsection