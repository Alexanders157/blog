<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Libraries\Cat;
use App\Models\Post;
use App\Models\User;
use http\Exception\RuntimeException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class PostController extends Controller
{
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

        $cat = new Cat('Jon', 'Рыжий кот', 20);


        //return ;
    }
}
