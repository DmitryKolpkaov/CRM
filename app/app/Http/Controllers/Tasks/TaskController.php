<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::where('user_id', auth()->id())->paginate(5);
        $deletedTasks = Task::onlyTrashed()->where('user_id', auth()->id())->get();
        return view('Main.UserTasks.tasks', compact('tasks', 'deletedTasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Main.UserTasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required|date',
        ]);

        $task = new Task;
        $task->user_id = auth()->id();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->deadline = $request->deadline;
        $task->comment = $request->comment;
        $task->save();

        return redirect('tasks/your/tasks');
    }

    public function restore($id)
    {
        $task = Task::onlyTrashed()->find($id);
        if ($task) {
            $task->restore();
            return redirect('tasks/your/tasks')->with('success', 'Task restored');
        } else {
            return redirect('tasks/your/tasks')->with('error', 'Task not found');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $task = Task::withTrashed()->find($id);
        if ($task) {
            return view('Main.UserTasks.show', compact('task'));
        } else {
            return redirect('tasks/your/tasks')->with('error', 'Task not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('Main.UserTasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required|date',
        ]);

        $task->title = $request->title;
        $task->description = $request->description;
        $task->deadline = $request->deadline;
        $task->comment = $request->comment;
        $task->save();

        return redirect('tasks/your/tasks')->with('success', 'Task updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('tasks/your/tasks');
    }
}
