@extends('layout.layout')

@section('title')
Home
@endsection

@section('body')

<div class="d-flex justify-content-between m-2">
    <a href="{{url('index/create')}}"> <button type="submit" class="btn btn-success"> Create Post </button> </a> 
    
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="{{url('users')}}"> <button type="submit" class="btn btn-secondary"> Users </button> </a> 

        <form action="{{url('logout')}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-dark">Logout</button>
        </form> 
    </div>
</div>

@if( session()->has('success'))
<div class="alert alert-success"> {{ session()->get('success')}} </div>
@endif

<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Content</th>
        <th scope="col">Image</th>
        <th scope="col">Author</th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <th scope="row">{{$loop->index++}}</th>
                <td>{{$post->title}}</td>
                <td>{{$post->content}}</td>
                <td><img src="{{asset('storage/'. $post->image)}}" class="w-25"></td>
                <td>{{$post->author}}</td>

                <td>
                    <form action="{{url('index/'. $post->id)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-info">Show</button>
                    </form>
                </td>

                <td> 
                    <a href="{{url('index/update/'. $post->id)}}"> <button type="submit" class="btn btn-primary"> Update </button> </a> 
                </td>

                <td>
                    <form action="{{Route('delete',['id'=>$post->id])}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form> 
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{$posts->links()}}








@endsection

    
