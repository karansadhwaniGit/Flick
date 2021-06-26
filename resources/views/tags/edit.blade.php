@extends('layouts.admin-layout.app')
@section('content')
<div class="card bg-dark text-light border border-light ">
    <div class="card-header border-bottom border-white"><h2>Edit Tag</h2></div>
    <form class="p-3" action="{{route('tags.update',$tag->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group col-6">
          <label for="exampleInputEmail1">Email:</label>
          <input type="text" placeholder="Enter Tag" class="form-control" name="name" value={{old('name', $tag->name)}}>
          @error('name')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}</small>
          @enderror
        </div>
        <div class="form-group col-6">
            <button type="submit" class="btn btn-outline-warning">Edit Tag</button>
        </div>
    </form>
</div>
@endsection
