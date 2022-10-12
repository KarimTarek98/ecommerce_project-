<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function allSliders()
    {
        $sliders = Slider::latest()->get();

        return view('admin.sliders.all', compact('sliders'));
    }

    public function addSliderView()
    {
        return view('admin.sliders.add-new-slider');
    }

    public function storeSlider(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required',
            'background' => 'required|mimes:jpg,png'
        ]);

        $sliderBg = $request->file('background');

        $imgGenName = date('mdYHis') . hexdec(uniqid()) . '.' . $sliderBg->getClientOriginalExtension();
        $savePath = 'uploads/sliders/' . $imgGenName;

        if (!file_exists(public_path('uploads/sliders')))
        {
            mkdir(public_path('uploads/sliders'), 666, true);
        }
        Image::make($sliderBg)->resize(870, 370)->save('uploads/sliders/' . $imgGenName);

        Slider::create([
            'title' => $request->title,
            'description' => $request->description,
            'background' => $savePath
        ]);

        return redirect()->route('admin.all-sliders')
            ->with('success', 'Slider Added Successfully');
    }

    public function editSliderPage($id)
    {
        $slider = Slider::findOrFail($id);

        return view('admin.sliders.edit', compact('slider'));
    }

    public function updateSlider(Request $request)
    {

        $request->validate([
            'title' => 'required|string',
            'description' => 'required',
            'background' => 'required|mimes:jpg,png'
        ]);

        $sliderId = $request->slider_id;

        $sliderToUpdate = Slider::findOrFail($sliderId);

        // update with new image
        if ($request->hasFile('background'))
        {
            // first thing delete old image
            unlink($sliderToUpdate->background);

            $newImg = $request->file('background');

            $imgGenName = date('mdYHis') . hexdec(uniqid()) . '.' . $newImg->getClientOriginalExtension();

            Image::make($newImg)->resize(300, 300)->save(public_path('uploads/sliders/' . $imgGenName));

            $savePath = 'uploads/sliders/' . $imgGenName;

            $sliderToUpdate->update([
                'title' => $request->title,
                'description' => $request->description,
                'background' => $savePath,
            ]);

            return redirect()->route('admin.all-sliders')
                ->with('info', 'Slider Updated with new image');

        }
        // update with the same image
        else
        {
            $sliderToUpdate->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);

            return redirect()->route('admin.all-sliders')
                ->with('info', 'Slider Updated Successfully');
        }
    }

    public function deActivate($id)
    {
        $slider = Slider::findOrFail($id);

        $slider->update(['status' => 0]);

        return redirect()->back()->with('error', 'Slider DeActivated');
    }

    public function activate($id)
    {
        $slider = Slider::findOrFail($id);

        $slider->update(['status' => 1]);

        return redirect()->back()->with('error', 'Slider Activated');
    }

    public function deleteSlider($id)
    {
        $sliderToDelete = Slider::findOrFail($id);

        // delete partner logo from public folder
        unlink($sliderToDelete->background);

        $sliderToDelete->delete();

        return redirect()->route('admin.all-sliders')
            ->with('error', 'Slider Deleted !');
    }
}
