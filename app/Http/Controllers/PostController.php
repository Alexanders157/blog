<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        if ($posts->isEmpty()) {
            return redirect()->back();
        }

        return view('posts', compact('posts'));
    }

    public function show(Post $post): View
    {
        return view('posts.show', compact('post'));
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function create(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        $post = New Post();
        return view('posts.create', compact('post'));
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

    public function edit ($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    public function update (Request $request, $id) {
        $post = Post::find($id);
        $post->update ($request->all());
        return redirect('/posts');
    }
}
