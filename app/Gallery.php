<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';

    protected $fillable = [
        'gallery_id',
        'gallery_name', 
        'gallery_url', 
        'gallery_tag',
        'user_id',
    ];

    public $timestamps = true;
}
