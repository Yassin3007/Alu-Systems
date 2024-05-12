<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Machine extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia , HasTranslations;

    public $translatable = ['name'];
    protected $guarded =[]; 

    public function slider(){
        return $this->belongsTo(Slider::class);
    }
}
