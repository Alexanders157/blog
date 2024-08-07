<?php

namespace App\Http\Controllers;

use App\Action\UpdatePostAction;
use App\Http\Requests\StorePostRequest;
use App\Libraries\Animal\Hippo;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Redis;


class PostController extends Controller
{
    public function index(): View|\Illuminate\Http\RedirectResponse
    {
        $user = auth()->user();
        $posts = Post::paginate(5);

        //dd($user->personal_token);
        if ($posts->isEmpty()) {
            return redirect()->back();
        }

        return view('posts', ['posts' => $posts]);
    }

    public function show(Post $post): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $comments = $post->comments()->with('user')->get();
        return view('posts.show', compact('post', 'comments'));

        $userId = auth()->id();

        $viewedPosts = Redis::get("user:{$userId}:viewed_posts");
        $viewedPosts = json_decode($viewedPosts, true) ?? [];

        array_unshift($viewedPosts, $post->id);
        $viewedPosts = array_unique($viewedPosts);
        $viewedPosts = array_slice($viewedPosts, 0, 5);

        Redis::set("user:{$userId}:viewed_posts", json_encode($viewedPosts));
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

    public function store(StorePostRequest $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|Application
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

        DB::transaction(function () use ($request) {
            $post = new Post();
            $post->title = $request->input('title');
            $post->content = $request->input('content');
            $post->category_id = $request->input('category_id');
            $post->save();

            $qrCode = QrCode::format('png')->size(200)->generate(url("/posts/{$post->id}"));
            $filePath = public_path("/codes/{$post->id}.png");
            file_put_contents($filePath, $qrCode);

            $post->qr_code_path = "/codes/{$post->id}.png";
            $post->save();

            return redirect('/posts');
        });

    }

    public function edit($id) : \Illuminate\View\View|\Illuminate\Foundation\Application|Factory|Application
    {
        $post = Post::find($id);
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();
        return redirect()->route('posts.show', $post);
    }

    public function apiStore(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Post::create($validatedData);

        return response()->json($post, 201);
    }

    public function apiUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
        ]);

        $post = Post::findOrFail($id);
        $post->update($validatedData);

        return response()->json($post, 200);
    }

}
