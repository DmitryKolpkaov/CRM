<?php

namespace App\Http\Controllers\Teams;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;


class TeamsController extends Controller
{
    public function index()
    {
        $teams = Team::where('manager_id', auth()->id())->get();
        return view('Main.Teams.index', compact('teams'));
    }

    public function create()
    {
        return view('Main.Teams.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $team = new Team;
        $team->manager_id = auth()->id();
        $team->name = $request->name;
        $team->save();

        return redirect('teams/your/teams')->with('success', 'Team created successfully');
    }

    public function show(Team $team)
    {
        return view('Main.Teams.show', compact('team'));
    }

    public function invite(Request $request, Team $team)
    {
        $user = User::where('email', $request->email)->orWhere('name', $request->name)->first();
        if ($user) {
            $team->users()->attach($user->id);
            return redirect()->back()->with('success', 'User invited to the team');
        } else {
            return redirect()->back()->with('error', 'User not found');
        }
    }

    public function assignTask(Request $request, Team $team)
    {
        $user = User::where('email', $request->email)->first();
        if ($user && $team->users->contains($user)) {
            $task = new Task;
            $task->user_id = $user->id;
            $task->title = $request->title;
            $task->description = $request->description;
            $task->deadline = $request->deadline;
            $task->comment = $request->comment;
            $task->team_id = $team->id;
            $task->save();

            return redirect()->back()->with('success', 'Task assigned to user');
        } else {
            return redirect()->back()->with('error', 'User not found in this team');
        }
    }
}
