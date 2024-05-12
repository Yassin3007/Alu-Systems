<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Image;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::paginate(10);
       return view('admin.articles.index',compact('articles')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();

            $request->validate([
                'title_ar'=>'required',
                'title_en'=>'required',
                'description_ar'=>'required',
                'description_en'=>'required',
                'image'=>'required'
               ]);
        
               $article = Article::create([
                'title'=> ['ar'=>$request->title_ar ,'en'=>$request->title_en] ,
                'description'=>['ar'=>$request->description_ar ,'en'=>$request->description_en],
                
                
               ]);
               if($request->has('is_favorite')){
                $article->is_favorite = 1 ;
                $article->save();
               }
               $image = $request->image ;
        
              
                $image->storeAs($article->getTranslation('title', 'en'),$image->getClientOriginalName(),'images');
                $article->image = $image->getClientOriginalName();
                $article->save();
        
                
        
             
             
               DB::commit();
               return redirect()->route('articles.index');

        }catch(\Exception $e){

            DB::rollBack();
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        try{
            DB::beginTransaction();

            $request->validate([
                'title_ar'=>'required',
                'title_en'=>'required',
                'description_ar'=>'required',
                'description_en'=>'required',
              
               ]);
        
               $article->update([
                'title'=> ['ar'=>$request->title_ar ,'en'=>$request->title_en] ,
                'description'=>['ar'=>$request->description_ar ,'en'=>$request->description_en],
                
                
               ]);
               if($request->has('is_favorite')){
                $article->is_favorite = 1 ;
                $article->save();
               }else{
                $article->is_favorite = 0 ;
                $article->save();
               }
               $image = $request->image ;
        
                if($request->has('image')){


                    Storage::disk('images')->delete($article->getTranslation('title','en').'/'.$article->image);
                    $image->storeAs($article->getTranslation('title', 'en'),$image->getClientOriginalName(),'images');
                    $article->image = $image->getClientOriginalName();
                    $article->save();
                }
                
        
                
        
             
             
               DB::commit();
               return redirect()->route('articles.index');

        }catch(\Exception $e){

            DB::rollBack();
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        Storage::disk('images')->deleteDirectory($article->getTranslation('title','en'));
        $article->delete();
        

        return back();
    }
}
