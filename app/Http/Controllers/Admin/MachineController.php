<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use App\Models\Machine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $machines = Machine::all();
        return view('admin.machines.index', compact('machines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sliders = Slider::all();
        return view('admin.machines.create',compact('sliders'));
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
                'image' => 'required',
                'slider_id'=>'required'
            ]);

            $machine = Machine::create([
                'name' => ['ar' => $request->name_ar, 'en' => $request->name_en],
                'slider_id'=>$request->slider_id
            ]);

            $machine->addMediaFromRequest('image')->toMediaCollection('avatar');


            DB::commit();
            return redirect()->route('machines.index');
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
        $machine  = Machine::findOrFail($id);
        $sliders = Slider::all();

        return view('admin.machines.edit', compact('machine','sliders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $machine = Machine::findOrFail($id);
        try {
            DB::beginTransaction();

            $request->validate([
                'name_ar' => 'required',
                'name_en' => 'required',
                'slider_id'=>'required'
                
            ]);

            $machine->update([
                'name' => ['ar' => $request->name_ar, 'en' => $request->name_en],
                'slider_id'=>$request->slider_id
            ]);



            if ($request->has('image')) {
                $media = $machine->media()->first();
                if ($media) {
                    $media->delete();
                }
                $machine->addMediaFromRequest('image')->toMediaCollection('avatar');
            }

            DB::commit();
            return redirect()->route('machines.index');
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
        $machine = Machine::findOrFail($id);

        // Detach any associated projects
        $media = $machine->media()->first();
        if ($media) {
            $media->delete();
        }
        // Delete the machine from the database
        $machine->delete();

        return redirect()->route('machines.index')->with('success', 'Machine deleted successfully.');

    }
}
