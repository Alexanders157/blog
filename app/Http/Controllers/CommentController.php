<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $postID): JsonResponse
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        if (Auth::user()->isAdmin()) {
            return response()->json(['error' => 'Вы не можете оставлять комментарии как админ.'], 403);
        }

        $comment = new Comment([
            'message' => $request->message,
            'user_id' => auth()->id(),
            'post_id' => $postID,
        ]);

        $comment->save();

        // Загружаем отношения для корректного отображения имени пользователя
        $comment->load('user');

        return response()->json([
            'success' => 'Комментарий добавлен!',
            'comment' => $comment
        ]);
    }

    public function show($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));
    }
    public function getComments($postID)
    {
        $comments = Comment::where('post_id', $postID)->orderBy('created_at', 'desc')->get();
        return response()->json($comments);
    }

}
