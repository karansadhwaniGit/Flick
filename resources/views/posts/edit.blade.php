@extends('layouts.admin-layout.app')
@section('page-level-styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
@section('content')
<div class="card bg-dark text-light border border-light ">
    <div class="card-header border-bottom border-white"><h2>Edit-Post</h2></div>
    <form class="p-3" action="{{route('posts.update',$post->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group col-6">
          <label for="exampleInputEmail1">Title:</label>
          <input type="text" placeholder="Enter title" class="form-control" name="title" value="{{old('title',$post->title)}}">
          @error('title')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}</small>
          @enderror
        </div>
        <div class="form-group col-6">
            <label for="exampleInputEmail1">Excerpt:</label>
            <input type="text" placeholder="Enter excerpt" class="form-control" name="excerpt" value="{{old('excerpt',$post->excerpt)}}">
            @error('excerpt')
              <small id="emailHelp" class="form-text  text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Content:</label>
            <input type="hidden" name="content" id="content" value="{{old('content',$post->content)}}">
            <trix-editor input="content"></trix-editor>
            @error('content')
              <small id="emailHelp" class="form-text  text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group col-4">
            <label for="exampleInputEmail1">Published_at:</label>
            <input type="text"
                   value="{{old('published_at',$post->published_at)}}"
                   class="form-control"
                   name="published_at"
                   id="published_at"
                   placeholder="Enter Date">
            @error('published_at')
                <small id="emailHelp" class="form-text  text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group col-6">
            <label for="exampleInputEmail1">Category:</label>
                <select  placeholder="Enter Category" class="form-control select2" name="category_id">
                    <option></option>
                    @foreach ($categories as $category)
                    @if($category->id == old('category',$category->id)))
                        <option value="{{$category->id}}" selected>{{$category->name}}</option>
                    @else
                      <option value="{{$category->id}}" >{{$category->name}}</option>
                    @endif
                    @endforeach
                </select>
            @error('category')
              <small id="emailHelp" class="form-text  text-danger">{{$message}}</small>
            @enderror
          </div>

        <div class="form-group col-8">
            <label for="exampleInputEmail1">Tags:</label>
            <select name="tags[]" class="form-control select2" style="background-color:black" multiple>
                <option></option>
                @foreach ($tags as $tag)
                    @if((old('tags') &&  (in_array($tag->id,old('tags'))))|| $post->hasTag($tag->id))
                    <option value="{{$tag->id}}" style="color:black" selected>
                        {{$tag->name}}
                    </option>
                    @else
                    <option value="{{$tag->id}}" style="color:black">
                        {{$tag->name}}
                    </option>
                    @endif
                @endforeach
                @error('tags')
                    <small id="emailHelp" class="form-text  text-danger">{{$message}}</small>
                @enderror
            </select>
        </div>
        <div class="form-group col-6">
            <label for="exampleInputEmail1">Image:</label>
            <input type="file" class="form-control" name="image">
            @error('image')
                <small id="emailHelp" class="form-text  text-danger">{{$message}}</small>
             @enderror
        </div>


        <div class="form-group col-6">
            <button type="submit" class="btn btn-outline-success">Submit</button>
        </div>
    </form>
</div>
@endsection
@section('page-level-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $('.select2').select2({
            placeholder:'Select an option:',
            allowClear:true
        });
        flatpickr('#published_at',{
            maxDate:"today",
            maxTime:'now',
            enableTime:true,
            dateFormat : "Y-m-d H:i"
        });
    </script>
@endsection
