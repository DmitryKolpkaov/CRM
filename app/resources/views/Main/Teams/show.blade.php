@extends('layout')

@section('content')
    <div class="container">
        <h1>{{ $team->name }}</h1>

        <!-- Form to invite a user -->
        <form method="POST" action="{{ route('team.invite', $team->id) }}" class="mb-3">
            @csrf
            <div class="form-group">
                <label for="name">User Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="User name" required>
            </div>
            <div class="form-group">
                <label for="email">User Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="User email" required>
            </div>
            <button type="submit" class="btn btn-primary">Invite User</button>
        </form>

        <!-- Form to assign a task -->
        <form method="POST" action="{{ route('team.user.assignTask', $team->id) }}">
            @csrf
            <div class="form-group">
                <label for="email">User Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="User email" required>
            </div>
            <div class="form-group">
                <label for="title">Task Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Task title" required>
            </div>
            <div class="form-group">
                <label for="description">Task Description</label>
                <textarea class="form-control" id="description" name="description" placeholder="Task description" required></textarea>
            </div>
            <div class="form-group">
                <label for="deadline">Deadline</label>
                <input type="date" class="form-control" id="deadline" name="deadline" required>
            </div>
            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea class="form-control" id="comment" name="comment" placeholder="Task comment"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Assign Task</button>
        </form>
        <hr>
        <br>
        <h1>Команда</h1>
        <ul>
            @foreach($team->users as $user)
                <li>Имя: {{ $user->name }} | Почта: {{$user->email}}</li>
            @endforeach
        </ul>
    </div>
@endsection
