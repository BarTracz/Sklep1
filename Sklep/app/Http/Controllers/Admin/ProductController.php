<?php

namespace App\Http\Controllers\Admin;

use App\Models\PC;
use App\Models\Brand;
use App\Models\Laptop;
use App\Models\Mobile;
use App\Models\Console;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use App\Models\Smartwatch;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PCFormRequest;
use App\Http\Requests\LaptopFormRequest;
use App\Http\Requests\MobileFormRequest;
use App\Http\Requests\ConsoleFormRequest;
use App\Http\Requests\ProductFormRequest;
use App\Http\Requests\SmartwatchFormRequest;

class ProductController extends Controller
{
    public function index(){
        
        $products = Product::all();
        return view('admin.products.index', compact('products'));
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

    public function edit(int $product_id){
        $products = Product::all();
        $brands = Brand::all();
        $product = Product::findOrFail($product_id);
        $pcs = PC::all();
        $laptops = Laptop::all();
        $mobiles = Mobile::all();
        $consoles = Console::all();
        $smartwatches = Smartwatch::all();
        return view('admin.products.edit', compact('products', 'brands', 'product', 'pcs', 'laptops', 'mobiles', 'consoles', 'smartwatches'));
    }

    public function update(ProductFormRequest $request, int $product) {
        $validatedData = $request->validated();

        $product = Product::findOrFail($product);
        if($product){
            $product->update([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'price' => $validatedData['price'],
                'quantity' => $validatedData['quantity'],
                'brand_id' => $validatedData['brand_id'],
                'status' => $request->status == true ? '1':'0' ,
                'trending' => $request->trending == true ? '1':'0' ,
             ]);

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
            $pc = PC::where('product_id', '=', $product->id)->firstOrFail();
            $pc->update([
            'os' => $validatedData['os'],
            'cpu' => $validatedData['cpu'],
            'gpu' => $validatedData['gpu'],
            'ram_type' => $validatedData['ram_type'],
            'ram_size' => $validatedData['ram_size'],
            'disk1_type' => $validatedData['disk1_type'],
            'disk1_size' => $validatedData['disk1_size'],
            'disk2_type' => $validatedData['disk2_type'],
            'disk2_size' => $validatedData['disk2_size'],
            ]);

        }
        if($product->category_name == 'laptops'){
            $laptop = Laptop::where('product_id', '=', $product->id)->firstOrFail();
            $laptop->update([
            'os' => $validatedData['os'],
            'cpu' => $validatedData['cpu'],
            'gpu' => $validatedData['gpu'],
            'ram_type' => $validatedData['ram_type'],
            'ram_size' => $validatedData['ram_size'],
            'disk1_type' => $validatedData['disk1_type'],
            'disk1_size' => $validatedData['disk1_size'],
            'disk2_type' => $validatedData['disk2_type'],
            'disk2_size' => $validatedData['disk2_size'],
            'display_size' => $validatedData['display_size'],
            ]);

        }
        if($product->category_name == 'mobiles'){
            $mobile = Mobile::where('product_id', '=', $product->id)->firstOrFail();
            $mobile->update([
            'os' => $validatedData['os'],
            'ram_size' => $validatedData['ram_size'],
            'memory_size' => $validatedData['memory_size'],
            'display_size' => $validatedData['display_size'],
            ]);

        }
        if($product->category_name == 'consoles'){
            $console = Console::where('product_id', '=', $product->id)->firstOrFail();
            $console->update([
            'type' => $validatedData['type'],
            'disk_size' => $validatedData['disk_size'],
            'controller_number' => $validatedData['controller_number'],
            ]);

        }
        if($product->category_name == 'smartwatches'){
            $smartwatch = Smartwatch::where('product_id', '=', $product->id)->firstOrFail();
            $smartwatch->update([
            'os' => $validatedData['os'],
            'display_size' => $validatedData['display_size'],
            'connection_type' => $validatedData['connection_type'],
            'has_gps' => $request->has_gps == true ? '1':'0',
            ]);

        }
        return redirect('/admin/products')->with('message', 'Product updated successfully');
    }
}

    public function destroyImage(int $product_image_id) {
        $productImage = ProductImage::findOrFail($product_image_id);
        if(File::exists($productImage->image)){
            File::delete($productImage->image);
        }
        $productImage->delete();
        return redirect()->back()->with('message', 'Product image deleted');
    }

    public function destroy(int $product_id) {
        $product = Product::findorFail($product_id);
        if($product->productImages()){
            foreach($product->productImages as $image){
                if(File::exists($image->image)){
                    File::delete($image->image);
                }
            }
        }
        $product->delete();
        return redirect()->back()->with('message','Product deleted');
    }
}
