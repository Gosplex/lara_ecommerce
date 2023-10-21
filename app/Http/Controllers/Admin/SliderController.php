<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SliderFormRequest;

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

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/slider/', $fileName);
            $validatedData['image'] = 'uploads/slider/' . $fileName;
        }

        $validatedData['status'] = $request->has('status') ? 1 : 0;
        $validatedData['blog_slider'] = $request->has('blog_slider') ? 1 : 0;

        Slider::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'status' => $validatedData['status'],
            'blog_slider' => $validatedData['blog_slider'],
        ]);



        return redirect('admin/sliders')->with('success', 'Slider created successfully.');
    }

    public function edit(Slider $slider)
    {
        $slider = Slider::find($slider->id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(SliderFormRequest $request, Slider $slider)
    {
        $validatedData = $request->validated();


        $destination = $slider->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/slider/', $fileName);
            $validatedData['image'] = 'uploads/slider/' . $fileName;
        }

        $validatedData['status'] = $request->has('status') ? 1 : 0;

        Slider::where('id', $slider->id)->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'status' => $validatedData['status'],
            'blog_slider' => $validatedData['blog_slider']
        ]);

        return redirect('admin/sliders')->with('success', 'Slider updated successfully.');
    }

    public function destroy(Slider $slider)
    {
        $destination = $slider->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        $slider->delete();

        return redirect()->route('admin.sliders')->with('success', 'Slider deleted successfully.');
    }
}
