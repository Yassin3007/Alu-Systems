<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Project;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        return view('admin.categories.create', compact('projects'));
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
                'image' => 'required'
            ]);

            $category = Category::create([
                'name' => ['ar' => $request->name_ar, 'en' => $request->name_en],
                'data' => ['ar' => $request->description_ar, 'en' => $request->description_en],


            ]);
            if ($request->projects) {
                foreach ($request->projects as $projectId) {
                    Project::findOrFail($projectId)->update([
                        'category_id' => $category->id
                    ]);
                }
            }

            $category->addMediaFromRequest('image')->toMediaCollection('avatar');

            DB::commit();
            return redirect()->route('categories.index');
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
        $category  = Category::findOrFail($id);
        $projects = Project::all();

        return view('admin.categories.edit', compact('category', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        try {
            DB::beginTransaction();

            $request->validate([
                'name_ar' => 'required',
                'name_en' => 'required',
                'description_ar' => 'required',
                'description_en' => 'required',

            ]);

            $category->update([
                'name' => ['ar' => $request->name_ar, 'en' => $request->name_en],
                'data' => ['ar' => $request->description_ar, 'en' => $request->description_en],


            ]);

            if ($category->projects) {
                foreach ($category->projects as $project) {
                    $project->update([
                        'category_id' => null
                    ]);
                }
            }

            if ($request->projects) {
                foreach ($request->projects as $projectId) {
                    Project::findOrFail($projectId)->update([
                        'category_id' => $category->id
                    ]);
                }
            }



            if ($request->has('image')) {
                $media = $category->media()->first();
                if ($media) {
                    $media->delete();
                }
                $category->addMediaFromRequest('image')->toMediaCollection('avatar');
            }






            DB::commit();
            return redirect()->route('categories.index');
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
        $category = Category::findOrFail($id);

        $media = $category->media()->first();
        if ($media) {
            $media->delete();
        }
        $category->delete();
        return back();
    }
}
