<?php

namespace App\Http\Controllers\Front;

use App\Models\City;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Partner;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Certificate;
use App\Models\Client;
use App\Models\Product;
use App\Models\Slider;

class FrontController extends Controller
{
    public function getCategory($id){
   
        $category = Category::with('projects.media')->findOrFail($id);
        return view('front.category',compact('category'));
    }

    public function getClient($id){
        $client = Client::findOrFail($id);
        $project = Project::findOrFail($client->project_id) ;
        return view('front.client',compact('client', 'project'));
   
    }

    public function partners(){
        $partners = Partner::all();
        return view('front.parteners',compact('partners'));
    }
    public function certificates(){
        $certificates = Certificate::all();
        return view('front.certificates',compact('certificates'));
    }

    public function products(){
        $products = Product::all();
        return view('front.products',compact('products'));
    }

    public function projects(){
        $projects = Project::all();
        return view('front.projects',compact('projects'));
    }

    public function getProject($id){
        $project = Project::findOrFail($id);
        $images = $project->getMedia('images');
        return view('front.project' , compact('project','images'));
    }
    public function sliderPage($id){
        $slider = Slider::findOrFail($id);
        return view('front.slider',compact('slider'));
    }
}
