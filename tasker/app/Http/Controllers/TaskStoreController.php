<?php

namespace App\Http\Controllers;

use App\Jobs\TaskCreated;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TaskStoreController extends Controller
{
    public function __invoke(Request $request)
    {
        $task = Task::query()->forceCreate([
            'status' => 'new',
            'task_guid' => Str::uuid()->toString(),
            'description' => $request->get('description'),
            'user_id' => $request->get('doer'),
        ]);

        TaskCreated::dispatch(
            $task->task_guid,
            $task->user->public_id,
            Auth::user()->public_id,
        );

        return redirect()->route('tasks.index');
    }
}
