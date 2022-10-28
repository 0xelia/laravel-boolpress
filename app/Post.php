<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    protected $fillable = [
        'title',
        'cover',
        'category_id',
        'content',
        'slug',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    // public function getCoverPathAttribute(){
    //     return $this->cover ? Storage::url($this->cover) : null;
    // }
}
