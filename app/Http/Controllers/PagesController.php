<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
        $posts = \App\Post::latest('published_at')->get();
        return view('welcome',compact('posts'));

    }
}
