<?php

use App\Models\Article;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\MachineController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SubProductController;
use App\Models\Category;
use App\Models\Client;
use App\Models\Slider;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// routes/web.php

Auth::routes();

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],function(){
    	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

        /**  All Dashboard Routes **/
    	Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
            Route::resource('projects',ProjectController::class);
            Route::resource('categories',CategoriesController::class);
            Route::resource('sub-products',SubProductController::class);
            Route::resource('clients',ClientController::class);
            Route::resource('partner',PartnerController::class);
            Route::resource('products',ProductController::class);
            Route::resource('machines',MachineController::class);
            Route::resource('certificates',CertificateController::class);
            Route::resource('slider',SliderController::class);
            
            Route::get('project_images/{id}',[ProjectController::class,'project_images'])->name('project_images');
            Route::post('project_add_images/{id}',[ProjectController::class ,'add_images'])->name('project_add_images');
            Route::get('delete_project_image/{project_id}/images/{media}',[ProjectController::class,'delete_project_image'])->name('delete_project_image');
            Route::get('accept_comment/{id}',[CommentController::class,'accept_comment'])->name('accept_comment');
            Route::get('comment_delete/{id}',[CommentController::class,'destroy'])->name('comment_delete');
        
            // Route::get('partners', [PartnerController::class, 'index'])->name('partners.index');
            Route::post('partners', [PartnerController::class, 'store'])->name('partners.add');
            // Route::delete('partners/{id}', [PartnerController::class, 'destroy'])->name('partners.delete');
        });

        Route::group([
            'prefix' => 'admin'
        ], function () {
            Route::resource('messages',MessageController::class);
            Route::resource('comments',CommentController::class);
        });






        /**  All Website Routes **/
        Route::get('/', function (){
            $projects = Project::latest()->take(3)->get();
            $categories = Category::all();
            $clients = Client::all();
            $sliders = Slider::all();
            return view('front.index', compact('projects','categories','clients','sliders'));
        })->name('index');  //->middleware('cache_response')->name('index');

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::get('category/{id}',[FrontController::class, 'getCategory'])->name('getCategory');
        Route::get('client/{id}',[FrontController::class, 'getClient'])->name('getClient');
        Route::get('project/{id}',[FrontController::class, 'getProject'])->name('getProject');
        Route::get('slider-page/{id}',[FrontController::class, 'sliderPage'])->name('sliderPage');

        Route::get('projects',[FrontController::class, 'projects'])->name('projects');
        Route::get('products',[FrontController::class, 'products'])->name('products');
        Route::get('get-sub-products/{id}',[FrontController::class, 'getSubProducts'])->name('getSubProducts');
        Route::get('certificates',[FrontController::class, 'certificates'])->name('certificates');
        Route::get('partners',[FrontController::class, 'partners'])->name('partners');




        Route::get('/about', function () {
            return view('front.about');
        })->name('about');
        Route::get('/contact-us', function () {
            return view('front.contact');
        })->name('contact');

    

   
        Route::get('/projects', [FrontController::class,'projects'])->name('projects');
        Route::get('get_project/{id}',[FrontController::class ,'get_project'])->name('get_project');
        Route::get('download/{id}',[FrontController::class,'download_pdf'])->name('download_pdf');

        Route::get('/partners', [FrontController::class, 'partners'])->name('partners');
    }
);

/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/