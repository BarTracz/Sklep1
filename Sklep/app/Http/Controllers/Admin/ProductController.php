<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConsoleFormRequest;
use App\Http\Requests\LaptopFormRequest;
use App\Http\Requests\MobileFormRequest;
use App\Http\Requests\PCFormRequest;
use App\Models\Brand;
use App\Models\Product;
use App\Models\PC;
use App\Models\Laptop;
use App\Models\Mobile;
use App\Models\Console;
use App\Models\Smartwatch;
use Illuminate\Http\Request;
use App\Http\Requests\ProductFormRequest;
use App\Http\Requests\SmartwatchFormRequest;

class ProductController extends Controller
{
    public function index(){
        return view('admin.products.index');
    }

    public function create(){
        $brands = Brand::all();
        return view('admin.products.create', compact('brands'));
    }

    public function store(ProductFormRequest $request){
        $validatedData = $request->validated();

        $product = new Product();

        $product->category_name = request('category_name');
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->quantity = $validatedData['quantity'];
        $product->brand_id = $validatedData['brand_id'];
        $product->status = $request->status == true ? '1':'0' ;
        $product->trending = $request->trending == true ? '1':'0' ;

        $product->save();

        if($request->hasFile('image')){
            $uploadPath = 'uploads/products/';
            
            $i = 1;
            foreach($request->file('image') as $imageFile){
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extension;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.$filename;

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }

        if($product->category_name == 'pcs'){

            $pc = new PC();

            $pc->product_id = $product->id;
            $pc->os = $validatedData['os'];
            $pc->cpu = $validatedData['cpu'];
            $pc->gpu = $validatedData['gpu'];
            $pc->ram_type = $validatedData['ram_type'];
            $pc->ram_size = $validatedData['ram_size'];
            $pc->disk1_type = $validatedData['disk1_type'];
            $pc->disk1_size = $validatedData['disk1_size'];
            $pc->disk2_type = $validatedData['disk2_type'];
            $pc->disk2_size = $validatedData['disk2_size'];

            $pc->save();
        }
        if($product->category_name == 'laptops'){

            $laptop = new Laptop();

            $laptop->product_id = $product->id;
            $laptop->os = $validatedData['os'];
            $laptop->cpu = $validatedData['cpu'];
            $laptop->gpu = $validatedData['gpu'];
            $laptop->ram_type = $validatedData['ram_type'];
            $laptop->ram_size = $validatedData['ram_size'];
            $laptop->disk1_type = $validatedData['disk1_type'];
            $laptop->disk1_size = $validatedData['disk1_size'];
            $laptop->disk2_type = $validatedData['disk2_type'];
            $laptop->disk2_size = $validatedData['disk2_size'];
            $laptop->display_size = $validatedData['display_size'];

            $laptop->save();
        }
        if($product->category_name == 'mobiles'){

            $mobile = new Mobile();

            $mobile->product_id = $product->id;
            $mobile->os = $validatedData['os'];
            $mobile->ram_size = $validatedData['ram_size'];
            $mobile->memory_size = $validatedData['memory_size'];
            $mobile->display_size = $validatedData['display_size'];

            $mobile->save();
        }
        if($product->category_name == 'consoles'){

            $console = new Console();

            $console->product_id = $product->id;
            $console->type = $validatedData['type'];
            $console->disk_size = $validatedData['disk_size'];
            $console->controller_number = $validatedData['controller_number'];

            $console->save();
        }
        if($product->category_name == 'smartwatches'){

            $smartwatch = new Smartwatch();

            $smartwatch->product_id = $product->id;
            $smartwatch->os = $validatedData['os'];
            $smartwatch->display_size = $validatedData['display_size'];
            $smartwatch->connection_type = $validatedData['connection_type'];
            $smartwatch->has_gps = $request->has_gps == true ? '1':'0' ;       

            $smartwatch->save();
        }

        return redirect('/admin/products')->with('message', 'Product added successfully');
    }
}
