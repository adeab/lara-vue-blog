<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Image;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 
    // Displays all the categories
    public function allCategories (){

        $categories = Category::orderBy('id','desc')->get();
        return response()->json([
            'categories'=>$categories
        ],200);
    }
    // function to add a category
    public function addCategory(Request $request){
        
        $this->validate($request,[
            'name'=>'required|min:2|max:50'
        ]);

       //process the image
       $strpos = strpos($request->photo,';');
       $sub = substr($request->photo,0,$strpos);
       $ex = explode('/',$sub)[1];
       $name = time().".".$ex;
       $img = Image::make($request->photo);

       //select upload path
       $upload_path = public_path()."/categoryimage/";
       //create uploading path dynamically if not exists
       if (!file_exists($upload_path)) {
           mkdir($upload_path, 666, true);
       }
       //save the image
       $img->save($upload_path.$name); 
       $category = New Category();
       $category->name = $request->name;
       $category->cover_image = $name;
       $category->save();
       return ['message'=>'OK'];
    }
    // function to find a category
    public function editCategory ($id){

        $category = Category::find($id);
        return response()->json([
            'category'=>$category
        ],200);
    }
    // updates the category 
    public function updateCategory (Request $request, $id){
        
        $this->validate($request,[
            'name'=>'required|min:2|max:50'
        ]);
        //process the image
        $strpos = strpos($request->photo,';');
        $sub = substr($request->photo,0,$strpos);
        $ex = explode('/',$sub)[1];
        $name = time().".".$ex;
        $img = Image::make($request->photo);

        //select upload path
        $upload_path = public_path()."/categoryimage/";
        //create uploading path dynamically if not exists
        if (!file_exists($upload_path)) {
            mkdir($upload_path, 666, true);
        }
        //save the image
        $img->save($upload_path.$name);
        
        $category = Category::find($id);
        $category->cover_image = $name;
        $category->name = $request->name;
        $category->save();
    }
    // deletes the category
    public function deleteCategory ($id){

        $category = Category::find($id);
        $category->delete();
    }
}
