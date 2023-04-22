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
                                <select name="category_name" id="selector" class="form-control" onchange="category()" disabled>
                                    <option value="{{ $product->category_name }}">{{ $product->category_name }}</option>
                                    <option value="pcs">pcs</option>
                                    <option value="laptops">laptops</option>
                                    <option value="mobiles">mobiles</option>
                                    <option value="consoles">consoles</option>
                                    <option value="smartwatches">smartwatches</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 mt-3">
                                <label>Name</label>
                                <input type="text" name="name" value="{{ $product->name }}" class="form-control" />
                                @error('name') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 mt-3">
                                <label>Description</label>
                                <textarea name="description" class="form-control">{{ $product->description }}</textarea>
                                @error('description') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label>Price</label>
                                <input type="number" name="price" value="{{ $product->price }}" step="0.01" class="form-control" />
                                @error('price') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label>Quantity</label>
                                <input type="number" name="quantity" value="{{ $product->quantity }}" class="form-control" />
                                @error('quantity') <small class="text-danger">{{ $message }}</small>@enderror
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
                                @error('brand_id') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label>Hidden</label><br />
                                <input type="checkbox" name="status" {{ $product->status == '1' ? 'checked':'' }} style="width: 50px; height: 50px;" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label>Sale</label><br />
                                <input type="checkbox" name="isOnSale" {{ $product->isOnSale == '1' ? 'checked':'' }} style="width: 50px; height: 50px;" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label>Upload product images</label>
                                <input type="file" name="image[]" multiple class="form-control" />
                                @error('image') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            @if($product->productImages)
                            <div class="row">
                                @foreach ($product->productImages as $image)
                                <div class="col-md-4 mb-3">
                                    <img onload="setCategory()" src="{{ asset($image->image) }}" style="width: 80px;height: 80px;" value="{{ $image->image }}" ; class="md-4 border" alt="img" />
                                    <a href="{{ url('admin/product-image/'.$image->id.'/delete') }}" class="d-block">Remove</a>
                                </div>
                                @endforeach
                            </div>
                            @else
                            <h5>No image uploaded</h5>
                            @endif
                        </div>
                    </div>
                    <div id="details">
                        '<div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>OS</label>
                                    <input type="text" name="os" value="<?php {
                                                                            echo $product->Mobile->os;
                                                                        } ?>" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>RAM Size</label>
                                    <input type="number" name="ram_size" value="<?php {
                                                                                    echo $product->Mobile->ram_size;
                                                                                } ?>" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Memory Size</label>
                                    <input type="number" name="memory_size" value="<?php {
                                                                                        echo $product->Mobile->memory_size;
                                                                                    } ?>" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Display Size</label>
                                    <input type="number" name="display_size" value="<?php {
                                                                                        echo $product->Mobile->display_size;
                                                                                    } ?>" step="0.01" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
        </form>
    </div>
</div>
</div>

@endsection