@extends('layout')

@section('content')
    <div class="container">
        <h1>Edit Task</h1>
        <form method="POST" action="{{ route('user.tasks.update', $task->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" required>{{ $task->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="deadline">Deadline</label>
                <input type="date" class="form-control" id="deadline" name="deadline" value="{{ date('Y-m-d', strtotime($task->deadline)) }}" required>
            </div>
            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea class="form-control" id="comment" name="comment">{{ $task->comment }}</textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Update</button>
            <br>
            <br>
            <a href="{{ route('user.tasks', $task->id) }}" class="btn btn-primary">Вернуться назад</a>
        </form>
    </div>
@endsection
