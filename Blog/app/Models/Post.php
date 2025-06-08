<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable = [
        'title' , 'image' , 'content' , 'category', 'created_by'
    ];

    //relation between posts and category
    public function categoryData(){
        return $this->belongsTo(Category::class , 'category');
    }
     //relation between posts and user
      public function userData(){
        return $this->belongsTo(User::class , 'created_by');
    }
}

