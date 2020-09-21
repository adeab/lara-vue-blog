<?php

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/admin/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function () {
    //Category

    Route::post('/add-category','CategoryController@addCategory');
    Route::get('category','CategoryController@allCategories');
    Route::get('editcategory/{id}','CategoryController@editCategory');
    Route::post('update-category/{id}','CategoryController@updateCategory');
    Route::get('/deletecategory/{id}','CategoryController@selected_category');
    Route::delete('category/{id}','CategoryController@deleteCategory'); 

    //Post
    Route::get('/post','PostController@allPosts');
    Route::post('/savenewpost','PostController@addPost');
    Route::post('/savedraft','PostController@draftPost');
    // Route::post('/publish','PostController@publishPost');
    Route::post('/toggleStatus/{id}','PostController@togglePublishStatus');
    Route::post('/toggleFeatured/{id}','PostController@toggleFeaturedStatus');
    Route::get('/post/{id}','PostController@editPost');
    Route::post('/update/{id}','PostController@updatePost');
    Route::delete('/delete/{id}','PostController@deletePost');
});

Route::get('/blogpost','BlogController@getallBlogPost');
Route::get('/singlepost/{id}','BlogController@getPostById')->name('blog.show');
Route::get('/categories','BlogController@getallCategory');
Route::get('/categorypost/{id}','BlogController@getallPostByCategoryId');
Route::get('/search','BlogController@searchPost');
Route::get('/latestpost','BlogController@latestPost');


Route::get('/admin/{any}', function () {
    return view('home');
})->where('any','.*');
Route::get('{any}', function () {
    return view('welcome');
})->where('any','.*');