@extends('layout')

@section('content')
    <div class="container">
       <h1>Home Page!</h1>
        <br>
        <hr>
        <a class="btn btn-primary" href="{{route('user.tasks')}}">Задачи</a>
        <a class="btn btn-danger" href="{{route('logout')}}">Выйти</a>
    </div>
@endsection
