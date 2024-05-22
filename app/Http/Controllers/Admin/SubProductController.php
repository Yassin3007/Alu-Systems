<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\SubProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SubProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = SubProduct::all();
        return view('admin.sub_products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products =Product::all();
        return view('admin.sub_products.create', compact('products'));
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
                'description_ar' => 'required',
                'description_en' => 'required',
                'image' => 'required',
                'product_id'=>'required'
            ]);

            $product = SubProduct::create([
                'name' => ['ar' => $request->name_ar, 'en' => $request->name_en],
                'data' => ['ar' => $request->description_ar, 'en' => $request->description_en],
                'product_id'=>$request->product_id
            ]);
            

            $product->addMediaFromRequest('image')->toMediaCollection('avatar');

            DB::commit();
            return redirect()->route('sub-products.index');
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
        $subProduct  = SubProduct::findOrFail($id);
        $products = Product::all();

        return view('admin.sub_products.edit', compact('subProduct', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = SubProduct::findOrFail($id);
        try {
            DB::beginTransaction();

            $request->validate([
                'name_ar' => 'required',
                'name_en' => 'required',
                'description_ar' => 'required',
                'description_en' => 'required',
                'product_id'=>'required'
            ]);

            $product->update([
                'name' => ['ar' => $request->name_ar, 'en' => $request->name_en],
                'data' => ['ar' => $request->description_ar, 'en' => $request->description_en],
                'product_id'=>$request->product_id
            ]);

           
            if ($request->has('image')) {
                $media = $product->media()->first();
                if ($media) {
                    $media->delete();
                }
                $product->addMediaFromRequest('image')->toMediaCollection('avatar');
            }






            DB::commit();
            return redirect()->route('sub-products.index');
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
        $product = SubProduct::findOrFail($id);

        $media = $product->media()->first();
        if ($media) {
            $media->delete();
        }
        $product->delete();
        return back();
    }
}