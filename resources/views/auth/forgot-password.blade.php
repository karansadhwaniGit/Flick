@extends('layouts.auth.layout')
@section('content')
<div class="container mt100">

    <div class="row ">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul style="color: black;padding:2px">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
             @endforeach
            </ul>
        </div>
    @endif
        <div class="col-md-3"></div>
        <div class="col-md-6 p30 bg-dark3 text-white">
    <form action="{{route('password.email')}}"  method="POST">
        @csrf
        <div class="text-center">
            <h3 style="color:white">Forgot Password</h3>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1"  class="text-dark">Email:</label>
          <input type="email" class="form-control" name="email" id="exampleInputPassword1" placeholder="Enter Your Email Here">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Send Link</button>
        </div>
        <br>
    </form>
</div>
</div>
</div>
@endsection
