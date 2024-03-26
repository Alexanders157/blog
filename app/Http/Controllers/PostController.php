<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Libraries\Animal\Hippo;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        if (!$posts) {
            return redirect()->back();
        }

        return view('allposts', ['posts' => $posts]);
    }

   // public function show(Post $post)
   // {
        //$connection = mysqli_connect("172.17.0.1", "root", "12345", "laravel");
        //$query = "INSERT INTO posts (title, description) VALUES ('{$data['title']}', '{$data['message']}')";
//
        //$result = mysqli_query($connection, $query);
//
        //if ($result) {
        //    return redirect()->back();
        //}
  //      dd($post);
  //  }

    public function store(StorePostRequest $request)
    {
        //$data = $request->validated();
//
        //$connection = mysqli_connect("172.17.0.1", "root", "12345", "laravel");
        //$query = "INSERT INTO posts (title, description) VALUES ('{$data['title']}', '{$data['message']}')";
//
        //$result = mysqli_query($connection, $query);
//
        //if ($result) {
        //    return redirect()->back();
        //}
//
        ////return throw new RuntimeException('NO');
        //$post = new Post();
//
        //Post::query()->create([
        //    'title' => $data['title'],
        //    'description' => $data['message']
        //]);
//
        //DB::
        //return redirect()->back();

        //$cat = new Cat('Jon', 'Рыжий кот', 20);
        $hippo = new Hippo('Hi, Jon!');
        $hippo->changeColor();

        (new Hippo('Hi, Jon!'))->jump();

        //return ;

        $title = $request->input('title');
        $content = $request->input('content');
        DB::insert('INSERT INTO posts (title, content) VALUES (?, ?)', [$title, $content]);
        return redirect('/posts');
    }

    public function show($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $post = Post::find($id);

        return view('post', ['post' => $post]);
    }
    public function create()
    {
        return view('posts.create');
    }

    public function edit($id)
    {
        $post = DB::select('SELECT * FROM posts WHERE id = ?', [$id]);
        return view('post.edit', ['post' => $post]);
    }

    public function update(Request $request, $id)
    {
        $title = $request->input('title');
        $content = $request->input('content');
        DB::update('UPDATE posts SET title = ?, content = ? WHERE id = ?', [$title, $content, $id]);
        return redirect('/posts');
    }

}
