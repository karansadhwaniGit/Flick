<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    public function trash()
    {
        // dd(Post::onlyTrashed());
        $posts=Post::withTrashed();
        dd($posts);
        return view('posts.trash',compact(['posts']));
    }
}
