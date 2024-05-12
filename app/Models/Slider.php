<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends Model implements HasMedia
{
    use HasFactory ,InteractsWithMedia , HasTranslations;
    protected $guarded =[]; 
    public $translatable = ['name','description','facilities'];

    public function machines(){
        return $this->hasMany(Machine::class);
    }

}
