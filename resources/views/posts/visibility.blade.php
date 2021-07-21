@extends('layouts.admin-layout.app')
@section('page-level-styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
@endsection
@section('content')
    <div class="card bg-dark text-light ">
        <div class="card-header border border-bottom border-light"><h2>Posts Controller</h2></div>
        <div class="card-body border border-light p-0">
            <table class="table table-hover table-dark m-0">
                <thead>
                  <tr class="text-center bg-black">
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Category</th>
                    <th scope="col">Published</th>
                    <th scope="col">View</th>
                    <th scope="col">Visibility</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                @foreach($posts as $post)
                    <tr>
                        <td><img src="{{asset("$post->image_path")}}" alt="" width="80"></td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->author->name}}</td>
                        <td>{{$post->category->name}}</td>
                        <td>{{$post->published_at->diffForHumans()}}</td>
                        <td><a href="{{route('blogs.show',$post->id)}}"></a></td>
                        <td>
                        <form action="{{route('posts.toggle',$post->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            @if($post->visibility)
                                <button type="submit" style="border-radius:3px" class="text-primary bg-dark border border-primary p-2 "><i class="fas fa-eye"></i></button>
                            @else
                                <button type="submit" style="border-radius:3px" class="text-primary bg-dark border border-primary p-2"><i class="fas fa-eye-slash"></i></button>        
                            @endif
                        </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection
@section('page-level-scripts')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
@endsection
