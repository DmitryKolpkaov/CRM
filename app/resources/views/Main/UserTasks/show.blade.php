@extends('layout')

@section('content')
    <div class="container">
        <h1>{{ $task->title }}</h1>
        <p>Description: {{ $task->description }}</p>
        <p>Deadline: {{ $task->deadline }}</p>
        <p>Comment: {{ $task->comment }}</p>
        <a href="{{ route('user.tasks', $task->id) }}" class="btn btn-primary">Вернуться назад</a>
        <form method="POST" action="{{ route('user.tasks.restore', $task->id) }}">
            @csrf
            @method('PUT')
            <br>
            <button type="submit" class="btn btn-success">Восстановить задачу</button>
        </form>
    </div>
@endsection
