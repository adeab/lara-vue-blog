<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function allCategories(){
        $categories=Categry::all();
        return response()->json($categories, 200);
        // return response()->json(['categories'=>$categories], 200);

    }

    public function addCategory(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|min:2|max:50',
        ]);
        
        $category=new Category;
        $category->name= $request->name;
        $category->save();
        return ['message'=>'OK'];

    }
    
    public function editCategory($id){
        $category=Category::find($id);
        return response()->json($category, 200);

    }

    public function updateCategory(Request $request, $id)
    {
        $this->validate($request, [
            'name'=>'required|min:2|max:50',
        ]);
        
        $category=Category::find($id);
        $category->name= $request->name;
        $category->save();
        return ['message'=>'OK'];

    }

    public function deleteCategory($id){
        $category=Category::find($id);
        $category->delete();
    }
}
