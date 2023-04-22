@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Products
                    <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-sm text-white float-end">
                        Add Products
                    </a>
                </h3>
            </div>
            <div class="card-body">
               <table class="table table-bordered table-stripped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Brand ID</th>
                            <th>isOnSale</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->category_name }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->brand_id }}</td>
                            <td>{{ $product->isOnSale == '1' ? 'Yes':'No' }}</td>
                            <td>{{ $product->status == '1' ? 'Hidden':'Visible' }}</td>
                            <td>
                            @switch($product->category_name)
                                @case('pcs')
                                    <a href="{{ url('admin/products/'.$product->id.'/editpc') }}" class="btn btn-sm btn-success">Edit</a>
                                    @break
                                @case('laptops')
                                    <a href="{{ url('admin/products/'.$product->id.'/editlaptop') }}" class="btn btn-sm btn-success">Edit</a>
                                    @break
                                @case('mobiles')
                                    <a href="{{ url('admin/products/'.$product->id.'/editmobile') }}" class="btn btn-sm btn-success">Edit</a>
                                    @break
                                @case('smartwatches')
                                    <a href="{{ url('admin/products/'.$product->id.'/editsmartwatch') }}" class="btn btn-sm btn-success">Edit</a>
                                    @break
                                @case('consoles')
                                    <a href="{{ url('admin/products/'.$product->id.'/editconsole') }}" class="btn btn-sm btn-success">Edit</a>
                                    @break
                            @endswitch
                                <a href="{{ url('admin/products/'.$product->id.'/delete') }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="/">No products avilable</td>
                        </tr>
                        @endforelse
                    </tbody>
               </table>
            </div>
        </div>
    </div>        
</div>

@endsection