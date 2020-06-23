<?php


Route::get('/', function () {
    $posts= App\Post::latest('published_at')->get();
    return view('welcome',compact('posts'));
});

Route::get('admin',function(){
    return view('admin.dashboard');
});