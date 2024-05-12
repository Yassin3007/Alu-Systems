<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia , HasTranslations;

    protected $guarded =[]; 
    public $translatable = ['name'];

    public function projects(){
        return $this->belongsToMany(Project::class , 'product_projects');
    }
    

}
