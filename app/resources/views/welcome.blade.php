@extends('layout')
@section('content')
        <div class="container">
            <h1>Welcome page!</h1>
            <br>
            <div>
                <button><a href="{{route('login')}}">Авторизация</a></button>
                <hr>
                <button><a href="{{route('register')}}">Регистрация</a></button>
            </div>
        </div>
@endsection
