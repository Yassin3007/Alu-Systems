<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Certificate extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia ;
    protected $guarded =[];
}
