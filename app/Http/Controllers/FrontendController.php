<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function index()
    {
        $posts=Post::simplePaginate(4);
        $tags = Tag::all();
        $categories = categories::all();
        return view('blogs.index',compact(['posts','tags','categories']));
    }
}
