@extends('layouts.admin-layout.app')
@section('content')
<div class="card bg-dark text-light border border-light ">
    <div class="card-header border-bottom border-white"><h2>Edit Category</h2></div>
    <form class="p-3" action="{{route('categories.update',$category->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group col-6">
          <label for="exampleInputEmail1">Email:</label>
          <input type="text" placeholder="Enter Category" class="form-control" name="name" value={{old('name', $category->name)}}>
          @error('name')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}</small>
          @enderror
        </div>
        <div class="form-group col-6">
            <button type="submit" class="btn btn-outline-warning">Edit Category</button>
        </div>
    </form>
</div>
@endsection
