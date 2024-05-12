<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Project;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        return view('admin.clients.create',compact('projects'));
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
                'image' => 'required'
            ]);

            $client = Client::create([
                'project_id' => $request->project_id,
                'name' => ['ar' => $request->name_ar, 'en' => $request->name_en],
            ]);

            $client->addMediaFromRequest('image')->toMediaCollection('avatar');

            DB::commit();
            return redirect()->route('clients.index');
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
        $client  = Client::findOrFail($id);
        $projects = Project::all();

        return view('admin.clients.edit', compact('client','projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client = Client::findOrFail($id);
        try {
            DB::beginTransaction();

            $request->validate([
                'name_ar' => 'required',
                'name_en' => 'required',
                
            ]);

            $client->update([
                'name' => ['ar' => $request->name_ar, 'en' => $request->name_en],
                'project_id' => $request->project_id,


            ]);



            if ($request->has('image')) {
                $media = $client->media()->first();
                if ($media) {
                    $media->delete();
                }
                $client->addMediaFromRequest('image')->toMediaCollection('avatar');
            }






            DB::commit();
            return redirect()->route('clients.index');
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
        $client = Client::findOrFail($id);
        $media = $client->media()->first();
        if ($media) {
            $media->delete();
        }
        $client->delete();
        return back();
    }
}
