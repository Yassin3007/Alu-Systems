<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model implements HasMedia
{
    use HasFactory , HasTranslations , InteractsWithMedia;


    public $translatable = ['name','data'];
    protected $guarded =[];
    public $timestamps = false;
    public function images() : MorphMany {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function category(){
        return $this->belongsTo(Category::class , 'category_id');
    }

  


}
