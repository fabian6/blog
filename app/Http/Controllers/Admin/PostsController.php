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
    // public function create(){
    //     $categories = Category::all();
    //     $tags = Tag::all();
    //     return view('admin.posts.create',compact('categories','tags'));
    // }
    
    public function store(Request $request){
        $this->validate($request,['title'=> 'required']);
        $post = Post::create(['title'=> $request->get('title'), 'url'=>$request->get('title')]);
        return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post){
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'tags', 'categories'));
    }

    public function update(Post $post, Request $request){
        //validacion
        $this->validate($request,[
            'title'=> 'required',
            'body'=> 'required',
            'category'=> 'required',
            'tags'=> 'required',
            'excerpt'=> 'required'
        ]);
        // return Post::create($request->all());
        $post->title = $request->input('title');
        $post->url = str_slug($request->input('title'));
        $post->body = $request->input('body');
        $post->excerpt = $request->input('excerpt');
        $post->published_at = $request->filled('published_at') ? Carbon::parse($request->input('published_at')) : null ;
        $post->category_id = $request->input('category');
        //etiquetas
        $post->save();
        $post->tags()->sync($request->input('tags'));
        return redirect()->route('admin.posts.edit', $post)->with('flash','Tu publicación ha sido guardada');
    }
}
