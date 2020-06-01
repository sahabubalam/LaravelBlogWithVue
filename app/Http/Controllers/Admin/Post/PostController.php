<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category\category;
use App\Model\Post\post;
use App\Model\User;
use Auth;
use Image;

class PostController extends Controller
{
    public function Post()
    {
        $category=Category::all();
     //   $post=post::all();
       // $post=post::with('category','user')->get();
       // return view('admin.post.post',compact('post','category'));
        //return response()->json($post);
    }
   
      
    
    public function AddPost(Request $request)
    {
        $post= new Post();
        $post->cat_id=$request->category_id;
        $post->user_id=Auth::user()->id;
        $post->comment_id=$request->comment_id;
        $post->title=$request->title;
        $post->description=$request->description;
  
        $image=$request->file('image');
        if ($image) {
    		$image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/media/posts/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $post->image=$image_url;
          $post->save();
          return redirect('/post');
           
        // return response()->json($post);

        }
        else
        {
            $post->save();
            return redirect('/post');
        }
    }
    public function AllPost()
    {
        $post=post::with('user','category')->get();
        return response()->json([
            'posts'=>$post
        ], 200);
    }
    public function SavePost(Request $request)
    {
        $strpos = strpos($request->image,';');
        $sub = substr($request->image,0,$strpos);
        $ex = explode('/',$sub)[1];
        $name = time().".".$ex;
        $img = Image::make($request->image)->resize(200, 200);
        $upload_path = public_path()."/uploadimage/";
        $img->save($upload_path.$name);
        $post=new Post();
        $post->title=$request->title;
        $post->description=$request->description;
        $post->cat_id=$request->cat_id;
        $post->user_id=Auth::user()->id;
        $post->image = $name;
        $post->save();
    }
    public function DeletePost($id)
    {
        $post=post::find($id);
        $image_path=public_path()."/uploadimage/";
        $image=$image_path.$post->image;
        if(file_exists($image))
        {
            @unlink($image);
        }
        $post->delete();
    }
    public function EditPost($id)
    {
        $post=post::find($id);
        return response()->json([
            'post'=>$post
        ], 200);

    }
    public function UpdatePost(Request $request,$id)
    {
        $post=post::find($id);
      

        if($request->image!=$post->image)
        {
            $strpos = strpos($request->image,';');
            $sub = substr($request->image,0,$strpos);
            $ex = explode('/',$sub)[1];
            $name = time().".".$ex;
            $img = Image::make($request->image)->resize(200, 200);
            $upload_path = public_path()."/uploadimage/";
            $image= $upload_path.$post->image;
            $img->save($upload_path.$name);
            if(file_exists($image))
            {
                @unlink($image);
            }

        }
        else
        {
            $name=$post->image;
        }

       //if use this filed then the new filed added not audated $post=new Post();
        $post->title=$request->title;
        $post->description=$request->description;
        $post->cat_id=$request->cat_id;
        $post->user_id=Auth::user()->id;
        $post->image = $name;
        $post->save();
    }
}
