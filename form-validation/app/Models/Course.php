<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // protected $fillable =['title', 'slug' , 'image', 'category', 'price',  'description', ];

    protected $guarded=[]; //الممنوع وصولها
}
