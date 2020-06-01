<?php

namespace App\Model\Post;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
   
    protected $fillable = [
        'cat_id','user_id','comment_id','title','description','image',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function category()
    {
        return $this->belongsTo('App\Model\Category\category','cat_id');
    }
}
