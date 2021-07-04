@extends('layouts.auth.layout')
@section('content')
<div class="container mt100">
    <div class="row ">
        <div class="col-md-3"></div>
        <div class="col-md-6 p30 bg-dark3 text-white">
    <form action="{{route('login')}}" method="POST">
        @csrf
        <div class="text-center">
            <h3 style="color:white">Sign In</h3>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="color: black;padding:2px">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                 @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          @error('email')
            <strong><small id="emailHelp" class="text-danger">{{$message}}</small></strong>
          @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1" name="password" class="text-dark">Password</label>
          <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
          @error('password')
            <strong><small id="emailHelp" class="text-danger">{{$message}}</small></strong>
          @enderror
          <small id="emailHelp" class="text-muted">Forgot Your Password? <a style="color: white" href="{{route('password.request')}}">Reset Password</a></small>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <br>
    </form>
        <div class="text-center">
            <form action="{{route('register')}}" method="GET">
                @csrf
                <label for="">Have an account? <button type="submit" style="background-color:transparent;border:none">Sign Up</button></label>
            </form>
        </div>
</div>
</div>
</div>
@endsection
