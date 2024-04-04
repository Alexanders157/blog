<?php

namespace App\Action;

use Illuminate\Support\Facades\DB;

class UpdatePostAction
{
    private string $color;

    public function setCollor(string $color)
    {
        $this->color = $color;
    }

    public function getCollor()
    {
       return $this->color;
    }

    public function __invoke($request, $id)
    {
        $title = $request->input('title');
        $content = $request->input('content');
        DB::update('UPDATE posts SET title = ?, content = ? WHERE id = ?', [$title, $content, $id]);
        return redirect('/posts');
    }

    public function __clone(): void
    {
        // TODO: Implement __clone() method.
    }



}

