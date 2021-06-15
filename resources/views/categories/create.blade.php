@extends('layouts.admin-layout.app')
@section('content')
<div class="card bg-dark text-light border border-light ">
    <div class="card-header border-bottom border-white"><h2>Add-contact</h2></div>
    <form class="p-3" action="{{route('categories.create')}}" method="POST">
        <div class="form-group col-6">
          <label for="exampleInputEmail1">Email:</label>
          <input type="email" placeholder="Enter Category" class="form-control" name="name">
          {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
        </div>
        <div class="form-group col-6">
            <button type="submit" class="btn btn-outline-success">Submit</button>
        </div>
    </form>
</div>
@endsection
