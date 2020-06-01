<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\category\Category;


class CategoryController extends Controller
{
    public function Category()
    {
       // return view('admin.category.category');
    }
    public function AddCategory(Request $request)
    {
        $this->validate($request,[
            'category_name'=>'required|min:2|max:50'
        ]);
      
     $category=new Category();
     $category->category_name=$request->category_name;
     $category->save();
     return ['message'=>'ok'];
    
    //return redirect('/category');
    }

    public function AllCategory()
    {
        $category=Category::all();
        return response()->json([
            'categories'=>$category
        ]);
    }

    public function DeleteCategory($id)
    {
        $category=Category::find($id);
        $category->delete();
    }
    public function EditCategory($id)
    {
        $category=Category::find($id);
        return response()->json([
            'category'=>$category
        ],200);
    }
    public function UpdateCategory(Request $request,$id)
    {
        $category=Category::find($id);
        $category->category_name=$request->category_name;
        $category->save();
    }

}
