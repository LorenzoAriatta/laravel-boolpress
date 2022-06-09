<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//use Illuminate\Support\Str;

class Post extends Model
{
    //
    protected $fillable = ['title', 'content', 'slug', 'category_id', 'cover'];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }
}
