<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function index()
    {
        $posts=Post::search()->latest('published_at')->simplePaginate(3);
        // dd($posts);
        $tags = Tag::all();
        $categories = Category::all();
        return view('blogs.index',compact(['posts','tags','categories']));
    }
    function show(Post $post)
    {
        $categories=Category::all();
        $tags=Tag::all();
        return view('blogs.post',compact(['post','categories','tags']));
    }
    function tags(Tag $tag)
    {
        $tags=Tag::all();
        $categories=Category::all();
        $posts=$tag->posts()->search()->where('tag_id',"=",$tag->id)->latest('published_at')->simplePaginate(10);
        return view('blogs.index',compact(['posts','tags','categories']));
    }
    function categories(Category $category)
    {
        $tags=Tag::all();
        $categories=Category::all();
        $posts=$category->posts()->search()->where('category_id',"=",$category->id)->latest('published_at')->simplePaginate(10);
        return view('blogs.index',compact(['posts','tags','categories']));
    }
}
