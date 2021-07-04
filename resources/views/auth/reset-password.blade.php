@extends('layouts.auth.layout')
@section('content')
<div class="container mt100">
    <div class="row ">
        <div class="col-md-3"></div>
        <div class="col-md-6 p30 bg-dark3 text-white">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="color: black;padding:2px">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                 @endforeach
                </ul>
            </div>
        @endif

    <form action="{{route('password.update')}}" method="POST">
        @csrf
        <div class="text-center">
            <h3 style="color:white">Reset Password</h3>
        </div>
        <input type="hidden" name="token" value={{$request->token}}>
        <input type="hidden" name="email" value={{$request->email}}>
        <div class="form-group">
          <label for="exampleInputPassword1" name="password" class="text-dark">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
          @error('password')
              <strong><small id="emailHelp" class="text-danger">{{$message}}</small></strong>
          @enderror

        </div>
        <div class="form-group">
            <label for="exampleInputPassword1" name="password_confirmation" class="text-dark">Confirm Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirmation" placeholder="Password">
            @error('password-confirmation')
                <strong><small id="emailHelp" class="text-danger">{{$message}}</small></strong>
            @enderror
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Change Password</button>
        </div>
        <br>
    </form>
</div>
</div>
</div>
@endsection
