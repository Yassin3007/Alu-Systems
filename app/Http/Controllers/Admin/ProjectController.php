<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\City;
use App\Models\Image;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Services\ProjectsService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.projects.create', compact('categories'));
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
                'data_ar' => 'required',
                'data_en' => 'required',
                'images' => 'required',
                // 'category_id' => 'required|exists:categories,id'
            ]);

            $project = Project::create([
                // 'category_id' => $request->category_id,
                'name' => ['ar' => $request->name_ar, 'en' => $request->name_en],
                'data' => ['ar' => $request->data_ar, 'en' => $request->data_en],
            ]);
            $images = $request->images;

            foreach ($request->file('images') as $image) {
                $project->addMedia($image)->toMediaCollection('images');
            }
            DB::commit();
            return redirect()->route('projects.index');
        } catch (Exception $e) {

            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $categories = Category::all();
        return view('admin.projects.edit', compact('project', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {

        try {
            DB::beginTransaction();

            $request->validate([
                'name_ar' => 'required',
                'name_en' => 'required',
                'data_ar' => 'required',
                'data_en' => 'required',
                // 'category_id' => 'required|exists:categories,id'
            ]);

            $project->update([
                'name' => ['ar' => $request->name_ar, 'en' => $request->name_en],
                'data' => ['ar' => $request->data_ar, 'en' => $request->data_en],
            ]);

            

            //    foreach($images as $image){
            //     $image->storeAs($project->getTranslation('title', 'en'),$image->getClientOriginalName(),'images');
            //     Image::create([
            //         'image'=>$image->getClientOriginalName(),
            //         'imageable_type'=>'app\Models\Project',
            //         'imageable_id'=>$project->id 
            //     ]);

            //    }

            DB::commit();
            return redirect()->route('projects.index');
        } catch (Exception $e) {

            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return back();
    }

    public function project_images($id)
    {

        $project = Project::findOrFail($id);
        $images = $project->getMedia('images');
        return view('admin.projects.images', compact('project', 'images'));
    }

    public function add_images(Request $request, $id)
    {

        $project  = Project::findOrFail($id);

        $images = $request->images;


        foreach ($request->file('images') as $image) {
            $project->addMedia($image)->toMediaCollection('images');
        }

        return back();
    }

    public function delete_project_image($project_id ,$media)
    {

        $project = Project::findOrFail($project_id);

        $media = $project->getMedia('images')->find($media);
        if ($media) {
            $media->delete();
            return redirect()->back()->with('success', 'Image deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Image not found or already deleted.');
        }
    }
}
