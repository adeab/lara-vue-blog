<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class BlogSearchController extends Controller
{
    //
    public function index(Request $request)
  {
    $results = (new Search())
    ->registerModel(Post::class, ['title'])
    ->search($request->input('query'));
    
    return response()->json($results);
  }
}
