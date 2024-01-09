<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('Main.home');
    }

    public function userTasksPage(){
        $tasks = Task::where('user_id', auth()->id())->get();
        return view('Main.UserTasks.tasks', compact('tasks'));
    }
}
