<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Client;
use App\Models\Partner;
use App\Models\Project;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certificates = Certificate::all();
        return view('admin.certificates.index', compact('certificates'));
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

                'images' => 'required'
            ]);


            foreach ($request->file('images') as $image) {
                $certificate = new Certificate();
                // You might need to fill other attributes of Certificate here
                // For example: $certificate->name = $request->input('name');
                $certificate->save();
                $certificate->addMedia($image)->toMediaCollection('avatar');
            }

            DB::commit();
            return redirect()->route('certificates.index');
        } catch (\Exception $e) {

            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $certificate = Certificate::findOrFail($id);
        $media = $certificate->media()->first();
        if ($media) {
            $media->delete();
        }
        $certificate->delete();
        return back();
    }
}
