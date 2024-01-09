@extends('layout')

@section('content')
    <div class="container">
        <h1>Teams</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <br>
        <hr>
        <a class="btn btn-primary" href="{{route('teams.create')}}">create</a>
        <br>
        <hr>
        @foreach($teams as $team)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('team.show', $team->id) }}">{{ $team->name }}</a>
                    </h5>
                </div>
            </div>
        @endforeach
    </div>
@endsection
