@extends('layouts.admin-layout.app')
@section('content')
    <div class="d-flex justify-content-end text-light">
        <a href="{{ route('categories.create')}}" class="btn btn-outline-primary m-3">Add Category</a>
    </div>
    <div class="card bg-dark text-light ">
        <div class="card-header border border-bottom border-light"><h2>Categories</h2></div>
        <div class="card-body border border-light p-0">
            <table class="table table-hover table-dark m-0">
                <thead>
                  <tr class="text-center bg-black">
                    <th scope="col">Category</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td><a href="" class="btn btn-success">Edit</a></td>
                        <td><a href="" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
              </table>
        </div>
    </div>
    <div class="bg-dark my-2">
        {{$categories->links('vendor.pagination.bootstrap-4')}}
    </div>
@endsection
