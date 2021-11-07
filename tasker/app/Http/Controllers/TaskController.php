<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function __invoke()
    {
        $tasks = Task::query()->where('user_id', Auth::id())->get();

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }
}
