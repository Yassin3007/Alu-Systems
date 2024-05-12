<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Partner;
use App\Models\Project;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::all();
        return view('admin.partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'data_ar' => 'required',
                'data_en' => 'required',
                'image' => 'required'
            ]);

            $partner = Partner::create([
                'data' => ['ar' => $request->data_ar, 'en' => $request->data_en],
            ]);

            $partner->addMediaFromRequest('image')->toMediaCollection('avatar');

            DB::commit();
            return redirect()->route('partner.index');
        } catch (\Exception $e) {

            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $partner  = Partner::findOrFail($id);

        return view('admin.partners.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $partner = Partner::findOrFail($id);
        try {
            DB::beginTransaction();

            $request->validate([
                'data_ar' => 'required',
                'data_en' => 'required',
                
            ]);

            $partner->update([
                'data' => ['ar' => $request->data_ar, 'en' => $request->data_en],


            ]);



            if ($request->has('image')) {
                $media = $partner->media()->first();
                if ($media) {
                    $media->delete();
                }
                $partner->addMediaFromRequest('image')->toMediaCollection('avatar');
            }






            DB::commit();
            return redirect()->route('partner.index');
        } catch (\Exception $e) {

            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $partner = Partner::findOrFail($id);
        $media = $partner->media()->first();
        if ($media) {
            $media->delete();
        }
        $partner->delete();
        return back();
    }
}
