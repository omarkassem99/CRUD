@extends('layout.layout')

@section('title')
    Update Post
@endsection

@section('body')
    <form action="{{url('index/update/'. $post->id)}}" method="POST" class="card  w-50 border border-dark m-2 " enctype="multipart/form-data">
        @csrf
        
        <div class="card-header text-center bg-secondary">
            <h2>Update Post</h2>
          </div>

        <div class="mb-3 p-3">
            <label  class="form-label fs-3">Title</label>
            <input type="text" name="title" class="form-control" value="{{$post->title}}">
            @error('title')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3 p-3">
            <label class="form-label fs-3">Content</label>
            <textarea class="form-control form-control-lg" name="content" rows="3" value="">{{$post->content}}</textarea>
            @error('content')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
          </div>

          <div class="mb-3 p-3">
            <label  class="form-label fs-3">Attach Image</label>
            <input class="form-control" type="file" name="image" >
            <img src="{{asset('storage/'. $post->image)}}" class="w-25">

            @error('image')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
          </div>

        <div class="mb-3 p-3">
            <label  class="form-label fs-3">Author</label>
            <input type="text" name="author" class="form-control" value="{{$post->author}}">
            @error('author')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

       

        <div class="mb-3 p-3">
            <button type="submit" class="btn btn-primary btn-lg">Update</button>
          </div>

    </form>
    
@endsection

