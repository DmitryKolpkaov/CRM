@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>TASKS</h1>
            </div>
            <button><a href="{{route('user.tasks.create')}}">create</a></button>
            <br>
            <hr>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <br>
            <h1>Список активных задач</h1>
            @foreach($tasks as $task)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $task->title }}</h5>
                        <p class="card-text">{{ $task->description }}</p>
                        <p class="card-text">Deadline: {{ $task->deadline }}</p>
                        <p class="card-text">Comment: {{ $task->comment }}</p>
                        <a href="{{ route('user.tasks.edit', $task->id) }}" class="btn btn-primary">Редактировать</a>
                        <form method="POST" action="{{ route('user.tasks.destroy', $task->id) }}">
                            @csrf
                            @method('DELETE')
                            <br>
                            <button type="submit" class="btn btn-success">Завершить задачу</button>
                        </form>
                    </div>
                </div>
            @endforeach
            {{ $tasks->links('pagination::bootstrap-4') }}
            <h1>Список выполненных задач</h1>
            <div class="card">
                @foreach($deletedTasks as $task)
                    <div class="card-body">
                        <h5 class="card-title">{{ $task->title }}</h5>
                        <a href="{{ route('user.tasks.show', $task->id) }}" class="btn btn-primary">Посмотреть описание</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
