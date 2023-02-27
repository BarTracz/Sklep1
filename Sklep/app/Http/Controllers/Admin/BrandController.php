<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandFormRequest;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        return view('admin.brand.index');
    }

    public function create(){
        return view('admin.brand.create');
    }

    public function store(BrandFormRequest $request){

        $validatedData = $request->validated();

        $brand = new Brand;

        $brand->name = $validatedData['name'];
        $brand->slug = Str::slug($validatedData['slug']);
        $brand->status = $request->status == true ? '1':'0' ;
        $brand->save();

        return redirect('admin/brand')->with('message','Brand Added Successfully');
    }

    public function edit(Brand $brand){
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(BrandFormRequest $request, $brand){

        $validatedData = $request->validated();
        
        $brand = Brand::findOrFail($brand);

        $brand->name = $validatedData['name'];
        $brand->slug = Str::slug($validatedData['slug']);

        $brand->status = $request->status == true ? '1':'0' ;
        $brand->update();

        return redirect('admin/brand')->with('message','Brand Updated Successfully');
    }
}
