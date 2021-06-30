@extends('layouts.admin-layout.app')
@section('page-level-styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />@endsection
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
@endsection
@section('content')
<div class="card bg-dark text-light border border-light ">
    <div class="card-header border-bottom border-white"><h2>Add New Posts</h2></div>
    <form class="p-3" action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group col-6">
          <label for="exampleInputTitle1">Title:</label>
          <input type="text" placeholder="Enter Title" class="form-control" name="title" value={{old('title')}}>
          @error('title')
            <small id="titleHelp" class="form-text  text-danger">{{$message}}</small>
          @enderror
        </div>
        <div class="form-group col-6">
            <label for="exampleInputExcerpt1">Excerpt:</label>
            <input type="text" placeholder="Enter Excerpt" class="form-control" name="excerpt" value={{old('Excerpt')}}>
            @error('excerpt')
              <small id="excerptHelp" class="form-text  text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group col-6">
            <label for="content">Content:</label>
            <input id="content" placeholder="Enter Content" type="hidden" value={{old('Excerpt')}}>
            <trix-editor input="content">
            </trix-editor>
            @error('content')
              <small id="content" class="form-text  text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group col-6">
            <label for="category">Category:</label>
            <select name="category_id" id=""category_id" class="form-control select2">
                <option></option>
                @foreach ($categories as $category )
                    @if($category->id == old('category_id'))
                        <option value="{{$category->id}}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{$category->id}}" >{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
            @error('category_id')
              <small id="content" class="form-text  text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group col-6">
            <label for="tags">Tags:</label>
            <select name="tags[]" id=""tags" class="form-control select2" multiple>
                <option></option>
                @foreach ($tags as $tag )
                    <option value="{{$tag->id}}">
                        {{ (old('tags') && (in_array($tag->id, old('tags'))) ? 'selected' :'')}}
                        {{$tag->name}}
                    </option>
                @endforeach
            </select>
            @error('tags')
              <small id="content" class="form-text  text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group col-6">
            <label for="published_at">Published At:</label>
            <input type="text"
                   value="{{old('published_at')}}"
                   class="form-control"
                   name="published_at"
                   id="published_at">
        </div>

        <div class="form-control">
            <label for="image">Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image">
            @error('image')
                <small id='emailHelp' class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>


        <div class="form-group col-6">
            <button type="submit" class="btn btn-outline-success">Submit</button>
        </div>
    </form>
</div>
@endsection

@section('page-level-script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
    <script>
        $('.select2').select2({
            placeholder:'Select an option:',
            allowClear:true
        });
        flatpickr('#published_at',{
            enableTime:true,
            dateFormat ; "Y-m-d H:i"
        });
    </script>
@endsection
