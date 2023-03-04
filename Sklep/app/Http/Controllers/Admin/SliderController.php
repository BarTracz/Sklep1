<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderFormRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use function GuzzleHttp\Promise\all;

class SliderController extends Controller
{
    public function index(){
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    public function create(){
        return view('admin.slider.create');
    }

    public function store(SliderFormRequest $request){

        $valitedData = $request->validated();

        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('uploads/slider/', $filename);
            $valitedData['image'] = "uploads/slider/$filename";
        }
        
        $valitedData['status'] = $request->status == true ? '1':'0';

        Slider::create([
            'title' => $valitedData['title'],
            'description' => $valitedData['description'],
            'image' => $valitedData['image'],
            'status' => $valitedData['status'],
        ]);

        return redirect('admin/sliders')->with('message','Slider Added Successfuly');
    }

    public function edit(Slider $slider){

        return view('admin.slider.edit', compact('slider'));
    }

    public function update(SliderFormRequest $request, Slider $slider){

        $valitedData = $request->validated();

        if($request->hasFile('image')){

            $destination = $slider->image;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('uploads/slider/', $filename);
            $valitedData['image'] = "uploads/slider/$filename";
        }
        
        $valitedData['status'] = $request->status == true ? '1':'0';

        Slider::where('id', $slider->id)->update([
            'title' => $valitedData['title'],
            'description' => $valitedData['description'],
            'image' => $valitedData['image'] ?? $slider->image,
            'status' => $valitedData['status'],
        ]);

        return redirect('admin/sliders')->with('message','Slider Updated Successfuly');
    }

    public function destroy(Slider $slider) {
        
        if($slider->count() > 0){

            $destination = $slider->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $slider->delete();
            return redirect('admin/sliders')->with('message','Slider Deleted Successfuly');
        }

        return redirect('admin/sliders')->with('message','Something Went Wrong');
    }
}
