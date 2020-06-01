<?php

namespace App\Model\Category;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = [
        'category_name',
    ];
    public function posts()
    {
        return $this->hasMany('App\Post\post');
    }
}
