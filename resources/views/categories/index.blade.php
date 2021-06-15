@extends('layouts.admin-layout.app')
@section('content')
    <div class="d-flex justify-content-end text-light">
        <a href="{{ route('categories.create')}}" class="btn btn-outline-primary m-3">Add Category</a>
    </div>
    <div class="card bg-dark text-light ">
        <div class="card-header border border-light"><h2>Categories</h2></div>
            <div class="card-body border border-light">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, fugiat!
            </div>
    </div>
@endsection
