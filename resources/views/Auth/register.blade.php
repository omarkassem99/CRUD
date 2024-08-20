@extends('layout.layout')

@section('title')
Register    
@endsection

@section('body')
<div class="container w-50 mt-5">
    <form action="{{url('register')}}" method="POST" class="card border border-dark rounded" enctype="multipart/form-data">
        @csrf
        
        <div class="card-header text-center bg-secondary">
            <h2>Register</h2>
        </div>

        <div class="mb-3 p-3">
            <label  class="form-label fs-4">Name</label>
            <input type="text" name="name" class="form-control">
            @error('name')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3 p-3">
            <label class="form-label fs-4">Email</label>
            <input type="text" class="form-control" name="email"></input>
            @error('email')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        
        <div class="mb-3 p-3">
            <label  class="form-label fs-4">Password</label>
            <input class="form-control" type="password" name="password">
            @error('password')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>


        <div class="mb-3 p-3">
            <label  class="form-label fs-4">Confrim Password</label>
            <input type="password" name="password_confirmation" class="form-control">

            @error('password')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>


        <div class="mb-3 p-3">
            <button type="submit" class="btn btn-primary btn-lg">Register</button>

            <a href="{{url('login')}}" class="btn btn-secondary btn-lg">Login</a> 
        </div>

    </form>
</div>
@endsection