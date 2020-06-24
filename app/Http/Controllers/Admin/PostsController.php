<?php

namespace App\Http\Controllers\Admin;
use App\Post;
use App\Category;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    
    public function index(){
        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }
    public function create(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create',compact('categories','tags'));
    }
    
    public function store(Request $request){
        //validacion
        // return Post::create($request->all());
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->excerpt = $request->input('excerpt');
        $post->published_at = Carbon::parse($request->input('published_at'));
        $post->category_id = $request->input('category');
        //etiquetas
        $post->save();
        $post->tags()->attach($request->input('tags'));
        return back()->with('flash','Tu publicación ha sido creada');
    }
}
