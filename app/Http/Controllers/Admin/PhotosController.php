<?php

namespace App\Http\Controllers\Admin;
use App\Post;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    public function store (Post $post){
        $this->validate( request(),[
            'photo' => 'required|image|max:2048'
        ]);

        $photo =  request()->file('photo')->store('public');
        $photoUrl = Storage::url($photo);
        Photo::create([
            'url'=> $photoUrl,
            'post_id' => $post->id
        ]);
    }
}
