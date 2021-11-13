<?php

namespace App\Http\Controllers;

use App\Jobs\TaskCompleted;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class TaskCompleteController extends Controller
{

    public function __invoke(Task $task): RedirectResponse
    {
        $task->complete();

        TaskCompleted::dispatch(
            $task->task_guid,
            Auth::user()->public_id,
        );

        return redirect()->route('tasks.index');
    }
}
