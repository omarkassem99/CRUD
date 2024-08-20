@extends('layout.layout')

@section('title')
    Show Post
@endsection

@section('body')
    <div class="card mb-3 w-50">
        <img src="{{asset('storage/'. $post->image)}}" class="card-img-top " alt="...">
        <div class="card-body">
          <h5 class="card-title">{{$post->title}}</h5>
          <p class="card-text">{{$post->content}}</p>
          <p class="card-text"><small class="text-body-secondary">{{$post->author}}</small></p>
        </div>

@endsection