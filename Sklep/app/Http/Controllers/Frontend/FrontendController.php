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
use App\Models\Old_prices;
use Illuminate\Http\Request;
use App\Models\Slider;
use Carbon\Carbon;

class FrontendController extends Controller
{
    public function index() {
        $sliders = Slider::where('status', '0')->get();
        return view('frontend.index', compact('sliders'));
    }

    public function searchProducts(Request $request) {
        if($request->search) {
            $searchProducts = Product::where('name', 'LIKE', '%'.$request->search.'%')->latest()->paginate(1);
            return view('frontend.pages.search', compact('searchProducts'));
        }else{
            return redirect()->back()->with('message', 'Empty Search');
        }
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
        $highest_30day_price = 0;
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
            $attributes = $parameters->getAttributes();
            $lowest_price_from_30_days = Old_prices::where('old_price_id', $product->id)->where('created_at', '>', now()->subDays(30)->endOfDay())->min('price');
            $delete = Old_prices::whereDate('created_at', '<=', now()->subDays(30))->delete();
            return view('frontend.collections.products.view', compact('product', 'parameters', 'attributes', 'lowest_price_from_30_days'));
        }
       else {
            return redirect()->back();
        }
    }


}
