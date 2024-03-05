<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Allposts extends Controller
{
    public function show()
    {
        $posts = Post::all();
        return view('allposts', ['posts' => $posts]);
    }
}
