<?php

namespace App\Http\Controllers;

use App\Action\UpdatePostAction;
use App\Http\Requests\StorePostRequest;
use App\Libraries\Animal\Hippo;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $posts = Post::all();

        if (!$posts) {
            return redirect()->back();
        }

        return view('posts', compact('posts'));
    }

    public function show(Post $post): View|\Illuminate\Foundation\Application|Factory|Application
    {
        dd($post->category);
        return view('posts.show', compact('post'));
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function create(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
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
        //$hippo = new Hippo('Hi, Jon!');
        //$hippo->changeColor();

        //(new Hippo('Hi, Jon!'))->jump();

        //return ;

        $title = $request->input('title');
        $content = $request->input('content');

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->description;
        $post->save();

        $qrCode = QrCode::format('png')->size(200)->generate(url("/posts/{$post->id}"));

        $filePath = public_path("/qrcodes/{$post->id}.png");
        file_put_contents($filePath, $qrCode);

        $post->qr_code_path = "/qrcodes/{$post->id}.png";
        $post->save();

        return redirect('/posts');

    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', ['post' => $post]);

    }

    public function update(Request $request, $id, UpdatePostAction $action)
    {
        $action->setCollor('string');
        return $action($request, $id);
    }

}
