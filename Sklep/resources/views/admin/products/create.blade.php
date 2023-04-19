@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Add Product
                    <a href="{{ url('admin/products') }}" class="btn btn-danger btn-sm text-white float-end">
                        BACK
                    </a>
                </h3>
            </div>
            <div class="card-body" id="card-body">
                <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-md-4">    
                                <div class="mb-3 mt-3">
                                    <label>Category</label>
                                    <select name="category_name" id="selector" class="form-control" onchange="category()">
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
                                    <input type="text" name="name" class="form-control"/>
                                    @error('name') <small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 mt-3">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control"></textarea>
                                    @error('description') <small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Price</label>
                                    <input type="number" name="price" step="0.01" class="form-control"/>
                                    @error('price') <small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Quantity</label>
                                    <input type="number" name="quantity" class="form-control"/>
                                    @error('quantity') <small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Brand</label>
                                    <select name="brand_id" class="form-control">
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                    @error('brand') <small class="text-danger">{{ $message }}</small>@enderror
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Hidden</label><br/>
                                    <input type="checkbox" name="status" style="width: 50px; height: 50px;"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Sale</label><br/>
                                    <input type="checkbox" name="isOnSale" style="width: 50px; height: 50px;"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">        
                                    <label>Upload Product Images</label>
                                    <input type="file" name="image[]" multiple class="form-control"/>
                                    @error('image') <small class="text-danger">{{ $message }}</small>@enderror
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
                <button type="submit" class="btn btn-primary" >Submit</button>
            </div>
            </form> 
        </div>
    </div>        
</div>

@endsection