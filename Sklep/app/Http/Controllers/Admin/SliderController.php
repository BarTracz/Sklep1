<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderFormRequest;
use App\Models\Slider;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(SliderFormRequest $request)
    {
        $validatedData = $request->validated();

        $slider = new Slider();

        $slider->title = $validatedData['title'];
        $slider->description = $validatedData['description'];
        $slider->reference = $validatedData['reference'];
        $slider->status = $request->status == true ? '1' : '0';

        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/slider/';
            $imageFile = $request->file('image');
            $extension = $imageFile->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $imageFile->move($uploadPath, $filename);
            $finalImagePathName = $uploadPath . $filename;
            //open added image
            $img = Image::make($finalImagePathName);
            //resize added image with constant aspect ratio
            $img->resize(800, 600);
            //save added image at same path as before
            $img->save($finalImagePathName);
        }

        $slider->create([
            'title' => $slider->title,
            'description' => $slider->description,
            'reference' => $slider->reference,
            'image' => $finalImagePathName,
            'status' => $slider->status,
        ]);

        return redirect('admin/sliders')->with('message', 'Slider Added Successfuly');
    }

    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(SliderFormRequest $request, int $slider)
    {
        $validatedData = $request->validated();

        $slider = Slider::findOrFail($slider);
        $slider->title = $validatedData['title'];
        $slider->description = $validatedData['description'];
        $slider->status = $request->status == true ? '1' : '0';

        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/slider/';
            $imageFile = $request->file('image');
            $extension = $imageFile->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $imageFile->move($uploadPath, $filename);
            $finalImagePathName = $uploadPath . $filename;
            //open added image
            $img = Image::make($finalImagePathName);
            //resize added image with constant aspect ratio
            $img->resize(800, 600);
            //save added image at same path as before
            $img->save($finalImagePathName);

            $slider->update([
                'title' => $slider->title,
                'description' => $slider->description,
                'image' => $finalImagePathName,
                'status' => $slider->status,
            ]);
        }

        $slider->update([
            'title' => $slider->title,
            'description' => $slider->description,
            'status' => $slider->status,
        ]);



        return redirect('admin/sliders')->with('message', 'Slider Updated Successfuly');
    }

    public function destroy(Slider $slider)
    {

        if ($slider->count() > 0) {

            if (File::exists($slider->image)) {
                File::delete($slider->image);
            }
            $slider->delete();
            return redirect('admin/sliders')->with('message', 'Slider Deleted Successfuly');
        }

        return redirect('admin/sliders')->with('message', 'Something Went Wrong');
    }
}
