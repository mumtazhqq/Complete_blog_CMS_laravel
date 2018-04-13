<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','content','image_path'];


    public function category(){
        return $this->belongsTo(Category::class);
    }
}
