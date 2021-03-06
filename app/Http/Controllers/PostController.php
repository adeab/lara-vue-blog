<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class PostController extends Controller
{
    public function allPosts(){
        $posts = Post::with('user','category','tags')->orderBy('id','desc')->get();
        return response()->json([
            'posts'=>$posts
        ],200);
    }
    //post creating function
    public function addPost(Request $request){
        //validations
        $this->validate($request,[
            'title'=>'required|min:2|max:100',
            'body'=>'required|min:2'
        ]);
        //process the image
        $strpos = strpos($request->photo,';');
        $sub = substr($request->photo,0,$strpos);
        $ex = explode('/',$sub)[1];
        $name = time().".".$ex;
        $img = Image::make($request->photo);

        //select upload path
        $upload_path = public_path()."/uploadimage/";
        //create uploading path dynamically if not exists
        if (!file_exists($upload_path)) {
            mkdir($upload_path, 666, true);
        }
        //save the image
        $img->save($upload_path.$name);
        //new post/blog instance
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category_id;
        $post->user_id = Auth::user()->id;
        $post->photo = $name;
        $post->publish_status="published";
        $post->author = $request->author;
        $post->seo= implode(',',$request->seo);
        $post->slug= $request->slug;
        $post->save();
        //initialize tags array
        $tags=[];
        //store the tags
        foreach($request->tags as $tagName){
            $tag= Tag::where('name', $tagName)->first();
            if ($tag === null) {
                $tag=new Tag();
                $tag->name=$tagName;
                $tag->save();
            }
            array_push($tags, $tag->id);

        }
        //populate post_tag table accordingly
        $post->tags()->attach($tags);
    }
    public function editPost($id){
        $post = Post::find($id);
        return response()->json([
            'post'=>$post
        ],200);
    }
    public function updatePost(Request $request, $id){
        $post = Post::find($id);
        $this->validate($request,[
            'title'=>'required|min:2|max:100',
            'body'=>'required|min:2|max:1000'
        ]);


        if($request->photo!=$post->photo){
            $strpos = strpos($request->photo,';');
            $sub = substr($request->photo,0,$strpos);
            $ex = explode('/',$sub)[1];
            $name = time().".".$ex;
            $img = Image::make($request->photo);
            $upload_path = public_path()."/uploadimage/";
            $image = $upload_path. $post->photo;
            $img->save($upload_path.$name);

            if(file_exists($image)){
                @unlink($image);
            }
        }else{
            $name = $post->photo;
        }
        $post->slug=$request->slug;
        
        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category_id;
        $post->user_id = Auth::user()->id;
        $post->photo = $name;
        $post->save();
    }
    public function deletePost($id){
        $post = Post::find($id);
        $image_path = public_path()."/uploadimage/";
        $image = $image_path. $post->photo;
        if(file_exists($image)){
            @unlink($image);
        }
        $post->delete();
    }
    public function draftPost(){
        $this->validate($request,[
            'title'=>'required|min:2|max:100',
            'body'=>'required|min:2|max:1000'
        ]);
        $strpos = strpos($request->photo,';');
        $sub = substr($request->photo,0,$strpos);
        $ex = explode('/',$sub)[1];
        $name = time().".".$ex;
        $img = Image::make($request->photo)->resize(200, 200);
        $upload_path = public_path()."/uploadimage/";
        $img->save($upload_path.$name);
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category_id;
        $post->user_id = Auth::user()->id;
        $post->photo = $name;
        $post->publish_status="draft";
        $post->save();
    }
    public function togglePublishStatus($id)
    {
        $post = Post::find($id);
        $post->publish_status == 'published'? $post->publish_status='draft':$post->publish_status='published';
        $post->save();
        
    }
    public function toggleFeaturedStatus($id)
    {
        $post = Post::find($id);
        $post->featured == 0? $post->featured=1:$post->featured=0;
        $post->save();
        
    }

}