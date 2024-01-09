<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Task;

class CheckTaskOwner
{
    public function handle(Request $request, Closure $next, $id)
    {
        $task = Task::find($id);

        if ($task && $task->user_id == auth()->id()) {
            return $next($request);
        }

        return redirect('home')->with('error', 'You do not own this task');
    }
}
