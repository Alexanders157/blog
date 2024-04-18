<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __consturct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $postID)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $comment = new Comment ([
            'message' => $request->message,
            'user_id' => auth()->id(),
            'post_id' => $postID,
        ]);

        return redirect()->back()->with('success', 'Комментарий добавлен!');

        }
}
