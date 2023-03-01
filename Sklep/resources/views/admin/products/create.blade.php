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
                                    <input type="text" name="name" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 mt-3">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Price</label>
                                    <input type="number" name="price" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Quantity</label>
                                    <input type="number" name="quantity" min="1" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Brand</label>
                                    <select name="brand_id" class="form-control">
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Status</label>
                                    <input type="checkbox" name="status" class="form-control" style="width: 50px; height: 50px;"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Trending</label>
                                    <input type="checkbox" name="trending" class="form-control" style="width: 50px; height: 50px;"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">        
                                    <label>Upload Product Images</label>
                                    <input type="file" name="image" multiple class="form-control"/>
                                </div>
                            </div>
                            <div id="details">
                                <script type="text/javascript">
                                    function category(){
                                        var selected = document.getElementById("selector").value;
                                        switch (selected){
                                            case 'pcs':
                                                document.getElementById('details').innerHTML = "PC DETAILS";
                                                break;
                                            case 'laptops':
                                                document.getElementById('details').innerHTML = "LAPTOP DETAILS";
                                                break;
                                            case 'mobiles':
                                                document.getElementById('details').innerHTML = "MOBILE DETAILS";
                                                break;
                                            case 'consoles':
                                                document.getElementById('details').innerHTML = "CONSOLE DETAILS";
                                                break;
                                            case 'smartwatches':
                                                document.getElementById('details').innerHTML = "SMARTWATCH DETAILS";
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