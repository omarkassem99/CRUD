@extends('layout.layout')

@section('title')
Login    
@endsection

@section('body')
<div class="container w-50 mt-5"> 
  <form action="{{url('login')}}" method="POST" class="card  rounded border border-dark " enctype="multipart/form-data">
      @csrf
      
      <div class="card-header text-center bg-secondary">
          <h2>Login</h2>
        </div>

    
      <div class="mb-3 p-3">
          <label class="form-label fs-3">Email</label>
          <input type="text" class="form-control" name="email" rows="3"></input>
          @error('email')
          <div class="alert alert-danger">{{$message}}</div>
          @enderror
      </div>
      
      <div class="mb-3 p-3">
          <label  class="form-label fs-3">Password</label>
          <input class="form-control" type="password" name="password">
          @error('password')
          <div class="alert alert-danger">{{$message}}</div>
          @enderror
        </div>

      <div class="mb-3 p-3">
        <button type="submit" class="btn btn-primary btn-lg">Login</button>
        
        <a href="{{url('register')}}" class="btn btn-secondary btn-lg">Register</a> 
  
      </div>
  </form>
</div>
@endsection