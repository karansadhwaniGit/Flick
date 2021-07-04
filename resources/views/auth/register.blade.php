@extends('layouts.auth.layout')
@section('content')
<div class="container mt100">
    <div class="row ">
        <div class="col-md-3"></div>
        <div class="col-md-6 p30 bg-dark3 text-white">
    <form method="POST" action="{{route('register')}}">
        @csrf
        <div class="text-center">
            <h3 style="color:white">Sign Up</h3>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          @error('email')
              <strong><small id="emailHelp" class="text-danger">{{$message}}</small></strong>
          @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1" name="password" class="text-dark">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
          @error('password')
              <strong><small id="emailHelp" class="text-danger">{{$message}}</small></strong>
          @enderror
        </div>
        <div class="form-group">
              <label for="">name</label>
              <input type="text" class="form-control" style="name" id="exampleCheck1" name="name" placeholder="Enter Name">
              @error('name')
                <strong><small id="emailHelp" class="text-danger">{{$message}}</small></strong>
              @enderror
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <br>
        <div class="text-center">
            <label for="">Have an account? <a href="{{route('auth.login')}}" style="color:blue">Sign In</a></label>
        </div>
    </form>
</div>
</div>
</div>
@endsection
