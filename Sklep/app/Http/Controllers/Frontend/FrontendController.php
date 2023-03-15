<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PC;
use App\Models\Laptop;
use App\Models\Mobile;
use App\Models\Smartwatch;
use App\Models\Console;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Slider;

class FrontendController extends Controller
{
    public function index() {
        $sliders = Slider::where('status', '0')->get();
        return view('frontend.index', compact('sliders'));
    }


    public function categories() {
        $categories = [
            "pcs",
            "mobiles",
            "laptops",
            "consoles",
            "smartwatches",
        ];
        return view('frontend.collections.category.index', compact('categories'));
    }

    public function products($category_name) {
        $this->$category_name = $category_name;
        $product = Product::where('category_name', $category_name);
        $brands = [];
        if ($product!=null) {
            $products = $product->get();
            foreach($products as $item){
                if($brands == null){
                    foreach($item->brands as $brand){
                        if($brand != $brands){
                            array_push($brands,$brand);
                        }
                    }
                }
                else{
                    foreach($item->brands as $brand){
                        if(!in_array($brand,$brands)){
                            array_push($brands,$brand);
                        }
                    }
                }
            }
            return view('frontend.collections.products.index', compact('products','brands','category_name'));
        }
        else {
            return redirect()->back();
        }
    }

    public function productView(string $category_name, string $product_id) {
        $product = Product::where('id',$product_id)->where('status','0')->first();
        if ($product) {
            switch ($category_name){
                case 'pcs':
                    $parameters = PC::where('product_id', $product_id)->first();
                    break;
                case 'mobiles':
                    $parameters = Mobile::where('product_id', $product_id)->first();
                    break;
                case 'laptops':
                    $parameters = Laptop::where('product_id', $product_id)->first();
                    break;
                case 'consoles':
                    $parameters = Console::where('product_id', $product_id)->first();
                    break;
                case 'smartwatches':
                    $parameters = Smartwatch::where('product_id', $product_id)->first();
                    break;
            }
            return view('frontend.collections.products.view', compact('product', 'parameters'));
        }
       else {
            return redirect()->back();
        }
    }

 //   public function searchProducts(Request $request)
 //   {
 //       if($request->search) {
 //           $searchProduct = Product::where('name', 'LIKE', '%'.$request->search.'%')->latest()->paginate(15);
 //           return view('frontend.pages.search', compact('searchProducts'));
 //       }
 //       else {
 //           return redirect()->back()->with('message', 'Empty Search');
 //       }
 //   }
}
