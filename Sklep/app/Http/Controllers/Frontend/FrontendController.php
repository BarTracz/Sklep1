<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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

    //Wybierane są każde category_name z produktu, czyli po pare razy jest do wyboru kategoria np. pcs. -- Naprawić -- distinct() nie działa, albo nie wiem jak działa, group by posysa

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
        $product = Product::where('category_name', $category_name);
        $brands = [];
        if ($product) {
            $products = $product->get();
            foreach($products as $item){
                if($brands == null || gettype($brands) == 'string'){
                    foreach($item->brands as $brand){
                        if($brand->name != $brands){
                            array_push($brands,$brand->name);
                        }
                    }
                }
                else{
                    foreach($item->brands as $brand){
                        if(!in_array($brand->name,$brands)){
                            array_push($brands,$brand->name);
                        }
                    }
                }
            }
            return view('frontend.collections.products.index', compact('products','brands'));
        }
        else {
            return redirect()->back();
        }
    }

    /*public function productView(string $category_slug, string $product_slug) {
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {

            $product = $category->products()->where('slug', $product_slug)->where('status', '0')->first();
            if ($product) {
                return view('frontend.collections.products.view', compact('product', 'category'));
            }else {
                return redirect()->back();
            }
            
        }
       else {
            return redirect()->back();
        }
    }*/

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
