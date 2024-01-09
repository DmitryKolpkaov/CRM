@extends('layout')

@section('content')
    <div class="container">
        <h1>Create a Team</h1>
        <form method="POST" action="{{route('teams.store')}}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
