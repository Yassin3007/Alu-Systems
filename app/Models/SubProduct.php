<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubProduct extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia , HasTranslations ;
    public $translatable = ['name','data'];
    protected $guarded =[];

    public function product(){
        return $this->belongsTo(Product::class);
    }
 

}

