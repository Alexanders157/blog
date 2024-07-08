<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\ApiResource;
use App\Models\Post;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message' => 'list'
        ]);
    }

    public function index2()
    {
        return ApiResource::collection(Post::all());
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
       return Post::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return $post;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json([
        'message' => 'Post removed']);
    }
}



