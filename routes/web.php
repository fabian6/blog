<?php


Route::get('/', 'PagesController@home');
Route::get('blog/{id}','PostsController@show');



Route::group(['prefix'=> 'admin',
            'namespace'=>'Admin', 
            'middleware'=>'auth'],
function(){
    Route::get('/','AdminController@index')->name('dashboard');
    Route::get('posts','PostsController@index')->name('admin.posts.index');
    Route::get('posts/create','PostsController@create')->name('admin.posts.create');
    Route::post('posts','PostsController@store')->name('admin.posts.store');
    
});

Route::auth();



