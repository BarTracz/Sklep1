<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('admin.products.index');
    }

    public function create(){
        $brands = Brand::all();
        return view('admin.products.create', compact('brands'));
    }
}
