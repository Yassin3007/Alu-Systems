<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Partner extends Model implements HasMedia
{
    use HasFactory , HasTranslations , InteractsWithMedia;

    public $translatable = ['data'];

    protected $guarded  = [];
}
