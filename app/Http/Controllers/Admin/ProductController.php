<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Product;
use App\Models\Project;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        return view('admin.products.create',compact('projects'));
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

            $product = Product::create([
                'name' => ['ar' => $request->name_ar, 'en' => $request->name_en],
            ]);

            $product->addMediaFromRequest('image')->toMediaCollection('avatar');

            $product->projects()->attach($request->input('projects'));

            DB::commit();
            return redirect()->route('products.index');
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
        $product  = Product::findOrFail($id);
        $projects = Project::all();

        return view('admin.products.edit', compact('product','projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        try {
            DB::beginTransaction();

            $request->validate([
                'name_ar' => 'required',
                'name_en' => 'required',
                
            ]);

            $product->update([
                'name' => ['ar' => $request->name_ar, 'en' => $request->name_en],


            ]);

            $product->projects()->sync($request->input('projects'));


            if ($request->has('image')) {
                $media = $product->media()->first();
                if ($media) {
                    $media->delete();
                }
                $product->addMediaFromRequest('image')->toMediaCollection('avatar');
            }






            DB::commit();
            return redirect()->route('products.index');
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
        $product = Product::findOrFail($id);

        // Detach any associated projects
        $product->projects()->detach();

        $media = $product->media()->first();
        if ($media) {
            $media->delete();
        }
        // Delete the product from the database
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');

    }
}
