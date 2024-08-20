@extends('layout.layout')

@section('title')
    New Post
@endsection

@section('body')
    <form action="{{url('index/insert')}}" method="POST" class="card  w-75 border border-dark m-2 " enctype="multipart/form-data">
        @csrf
        
        <div class="card-header text-center bg-secondary">
            <h2>Create Post</h2>
          </div>

        <div class="mb-3 p-3">
            <label  class="form-label fs-3">Title</label>
            <input type="text" name="title" class="form-control">
            @error('title')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3 p-3">
            <label class="form-label fs-3">Content</label>
            <textarea class="form-control" name="content" rows="3"></textarea>
            @error('content')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        
        <div class="mb-3 p-3">
            <label  class="form-label fs-3">Attach Image</label>
            <input class="form-control" type="file" name="image">
            @error('image')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
          </div>


        <div class="mb-3 p-3">
            <label  class="form-label fs-3">Author</label>
            <input type="text" name="author" class="form-control">
            @error('author')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>


        <div class="mb-3 p-3">
            <button type="submit" class="btn btn-primary btn-lg">Create</button>
          </div>

    </form>

@endsection