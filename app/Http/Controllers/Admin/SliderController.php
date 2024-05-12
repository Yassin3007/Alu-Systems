<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'name_ar' => 'required',
                'name_en' => 'required',
                'facilities_ar' => 'required',
                'facilities_en' => 'required',
                'description_ar' => 'required',
                'description_en' => 'required',
                'image' => 'required',
                'images' => 'required',
                'video' => 'required'
            ]);

            $slider = Slider::create([
                'name' => ['ar' => $request->name_ar, 'en' => $request->name_en],
                'description' => ['ar' => $request->description_ar, 'en' => $request->description_en],
                'facilities' => ['ar' => $request->facilities_ar, 'en' => $request->facilities_en],


            ]);
            foreach ($request->file('images') as $image) {
                $slider->addMedia($image)->toMediaCollection('images');
            }

            $slider->addMediaFromRequest('image')->toMediaCollection('avatar');
            $slider->addMediaFromRequest('video')->toMediaCollection('video');

            DB::commit();
            return redirect()->route('slider.index');
        } catch (\Exception $e) {

            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        try {

            DB::beginTransaction();

            $request->validate([
                'name_ar' => 'required',
                'name_en' => 'required',
                'facilities_ar' => 'required',
                'facilities_en' => 'required',
                'description_ar' => 'required',
                'description_en' => 'required',

            ]);

            $slider->update([
                'name' => ['ar' => $request->name_ar, 'en' => $request->name_en],
                'description' => ['ar' => $request->description_ar, 'en' => $request->description_en],
                'facilities' => ['ar' => $request->facilities_ar, 'en' => $request->facilities_en],


            ]);
            if ($request->images) {
                $slider->clearMediaCollection('images');

                foreach ($request->file('images') as $image) {

                    $slider->addMedia($image)->toMediaCollection('images');
                }
            }


            if ($request->image) {
                $slider->clearMediaCollection('avatar');
                $slider->addMediaFromRequest('image')->toMediaCollection('avatar');
            }
            if ($request->video) {
                $slider->clearMediaCollection('video');
                $slider->addMediaFromRequest('video')->toMediaCollection('video');
            }


            DB::commit();
            return redirect()->route('slider.index');
        } catch (\Exception $e) {

            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $slider->media()->delete();
        $slider->delete();
        return back();
    }
}
