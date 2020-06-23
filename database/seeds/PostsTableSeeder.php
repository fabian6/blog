<?php
use App\Post;
use Carbon\Carbon;
use App\Category;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();
        Category::truncate();

        $category = new Category;
        $category->name = "Categoria 1";
        $category->save();

        $category = new Category;
        $category->name = "Categoria 2";
        $category->save();

        $category = new Category;
        $category->name = "Categoria 3";
        $category->save();

        $post = new Post;
        $post->title = "Mi primer post";
        $post->excerpt = "Extracto de mi primer post";
        $post->body = "<p>Contenido de mi primer post</p>";
        $post->category_id =1;
        $post->published_at= Carbon::now()->subDay(1);
        $post ->save();

        
        $post = new Post;
        $post->title = "Mi segundo post";
        $post->excerpt = "Extracto de mi segundo post";
        $post->body = "<p>Contenido de mi segundo post</p>";
        $post->category_id =1;
        $post->published_at= Carbon::now()->subDay(3);
        $post ->save();
        
        
        $post = new Post;
        $post->title = "Mi tercer post";
        $post->excerpt = "Extracto de mi tercer post";
        $post->body = "<p>Contenido de mi tercer post</p>";
        $post->category_id =2;
        $post->published_at= Carbon::now()->subDay(2);
        $post ->save();

        $post = new Post;
        $post->title = "Mi cuarto post";
        $post->excerpt = "Extracto de mi cuarto post";
        $post->body = "<p>Contenido de mi cuarto post</p>";
        $post->category_id =3;
        $post->published_at= Carbon::now()->subDay(4);
        $post ->save();
    }
}
