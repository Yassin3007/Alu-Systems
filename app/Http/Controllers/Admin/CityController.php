<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::all();
        return view('admin.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'city_ar' => [
                'required',
                'string',
                'between:2,50',
                'regex:/^[\p{Arabic}\s]+$/u', 
            ],
            'city_en' => [
                'required',
                'string',
                'between:2,50',
                'regex:/^[A-Za-z\s]+$/u',
            ]
        ]);

        $city = City::create([
            'name' => ['ar' => $request->city_ar, 'en' => $request->city_en]
        ]);

        $city->save();

        return redirect()
            ->route( 'cities.index')
            ->with('success', 'City created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        return view('admin.cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        $request->validate([
            'city_ar' => [
                'required',
                'string',
                'between:2,50',
                'regex:/^[\p{Arabic}\s]+$/u', 
            ],
            'city_en' => [
                'required',
                'string',
                'between:2,50',
                'regex:/^[A-Za-z\s]+$/u',
            ]
        ]);

        $city->name = ['ar' => $request->city_ar, 'en' => $request->city_en];
        $city->update();

        return redirect()
            ->route( 'cities.index')
            ->with('success', 'City updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();

        return redirect()
            ->route( 'cities.index')
            ->with('danger', 'City deleted successfully.');
    }
}
