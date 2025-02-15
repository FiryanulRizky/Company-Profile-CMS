<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    public function blogs(){
        return $this->belongsToMany('App\Blog');
        // return $this->belongsToMany(Blog::class);
    }
}
