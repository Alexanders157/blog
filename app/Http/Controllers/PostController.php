<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Libraries\Animal\Hippo;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        if (!$posts) {
            return redirect()->back();
        }

        return view('allposts', compact('posts'));
    }

    public function show(Post $post): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('posts.show', compact('post'));
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function create(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view('posts.create',['categories' => Category::all()]);
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
        $data = $request->validated();

        $data['photo'] = $data['photo']?->store('posts', 'public');

        $data['publication_date'] = now();

        if (!array_key_exists('author', $data)) {
            $data['author'] = 'Неизвестный';
        }

        /** @var Post $post */
        $post = Post::query()->create($data);

        return redirect("/posts/{$post->id}");
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
