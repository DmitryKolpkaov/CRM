@extends('layout')

@section('content')
    <div class="container">
       <h1>Home Page!</h1>
        <br>
        <hr>
        <button><a href="{{route('logout')}}">Выйти</a></button>
    </div>
@endsection
