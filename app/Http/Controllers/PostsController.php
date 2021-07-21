<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['verifyCategoriesCount'])->only('create', 'store');
        $this->middleware(['verifyTagsCount'])->only('create', 'store');
        $this->middleware(['verifyAuthor'])->only('edit','update','destroy','trash');
    }
    public function index()
    {
        if(auth()->user()->isAdmin()){
            $posts=Post::paginate(10);
        }else{
            $posts=Post::withoutTrashed()->where('user_id','=',auth()->id())->paginate(10);
        }
        return view('posts.index',compact(['posts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::all();
        $tags= Tag::all();
        return view('posts.create',compact(['categories','tags']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $image = $request->file('image')->store('images/posts');
        $post = Post::create([
            'title'=>$request->title,
            'excerpt'=>$request->excerpt,
            'content'=>$request->content,
            'category_id'=>$request->category_id,
            'user_id'=>auth()->id(),
            'image'=>$image,
            'published_at'=>$request->published_at

        ]);
        $post->tags()->attach($request->tags);
        session()->flash('success','Post Created Successfully');
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories=Category::all();
        $tags=Tag::all();
        return view('posts.edit',compact(['post','tags','categories']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request,Post $post)
    {
        $data=$request->only(['title','excerpt','published_at','content','category_id']);
        if($request->hasFile('image')){
            $image=$request->image->store('images/posts');
            $data['image']=$image;
            $post->deleteImage();
        }
        $post->update($data);
        $post->tags()->sync($request->tags);
        session()->flash('success',"Post Update Successfully!");
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)//this will not show if we (error dega) if we use route model binding
    {
        $post=Post::withTrashed()->findOrFail($id);
        $post->deleteImage();
        $post->forceDelete();
        session()->flash('success','Post Deleted Successfully!');
        return redirect(route('posts.trash'));
    }
    public function trashed()
    {
        $posts=Post::onlyTrashed()->paginate(10);
        return view('posts.trash',compact(['posts']));
    }
    public function trash(Post $post)
    {
        $post->delete();
        session()->flash('success',"Post Trashed Successfully");
        return redirect(route('posts.index'));
    }
    public function restore($id)//this will not show if we (error dega) if we use route model binding
    {
        $trashed=Post::onlyTrashed()->findOrFail($id);
        $trashed->restore();
        session()->flash("success","Post Restored Successfully!");
        return redirect(route('posts.index'));
    }
    public function visibility()
    {
        $posts=Post::oldest('published_at')->paginate(10);
        return view('posts.visibility',compact(['posts']));
    }
    public function toggle_visible(Post $post)
    {
        if($post->visibility==1){
            $post->visibility=0;
            session()->flash('success','Post has been made disabled to everyone!');
        }else{
            $post->visibility=1;
            session()->flash('success','Post has been made visible to everyone!');
        }
        $post->save();
        return redirect(route('posts.visible'));
    }
}
