<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $postID): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        if (Auth::user()->isAdmin()) {
            return redirect()->back()->withErrors(['Вы не можете оставлять комментарии как админ.']);
        }

        $comment = new Comment ([
            'message' => $request->message,
            'user_id' => auth()->id(),
            'post_id' => $postID,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $comment->save();

        return redirect()->back()->with('success', 'Комментарий добавлен!');

        }

    public function show($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $post = Post::findOrFail($id);

        return view('posts.show', compact('post' ));
    }

    public function getComments(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $comments = $post->comments;
        return view('comments', compact('comments'));
    }

}
