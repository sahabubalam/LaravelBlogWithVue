<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category\category;
use App\Model\Post\post;
use App\Model\User;

class BlogController extends Controller
{
    //
    public function ALlBlogPost()
    {
        $post=post::with('user','category')->get();
        return response()->json([
            'posts'=>$post
        ], 200);
    }
    public function SingleBlogPost($id)
    {
        $post=post::with('user','category')->where('id',$id)->first();
        return response()->json([
            'post'=>$post
        ], 200);
    }

    public function AllCategories()
    {
        $categories=Category::all();
        return response()->json([
            'categories'=>$categories
        ], 200);

    }
    public function AllCategoriesById($id)
    {
        $posts=post::with('user','category')->where('cat_id',$id)->get();
        return response()->json([
            'posts'=>$posts
        ], 200);

    }
    //Real time search
    public function SearchPost()
    {
        $search=\Request::get('s');
        $post=post::with('user','category')
        ->where('title','LIKE',"%$search%")
        ->orWhere('description','LIKE',"%$search%")
        ->get();
        return response()->json([
            'posts'=>$post
        ], 200);
    }

}
