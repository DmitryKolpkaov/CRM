@extends('layout')

@section('content')
    <div class="container">
       <h1>Home Page!</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <br>
        <hr>
        <a class="btn btn-primary" href="{{route('user.tasks')}}">Задачи</a>
        @if(auth()->user()->type === 'manager')
            <a class="btn btn-primary" href="{{route('teams')}}">Команды</a>
        @endif
        <a class="btn btn-danger" href="{{route('logout')}}">Выйти</a>
    </div>
@endsection
