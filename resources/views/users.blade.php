@extends('layout.layout')

@section('title')
    Home
@endsection

@section('body')

    @if( session()->has('success'))
    <div class="alert alert-success"> {{ session()->get('success')}} </div>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{$loop->index++}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>                
                </tr>
            @endforeach
        </tbody>
    </table>

    {{$users->links()}}
    
@endsection

    
