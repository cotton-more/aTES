<?php

namespace App\Http\Controllers;

use App\Jobs\TaskReassigned;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TaskReassignController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $employees = User::employees()->get();

        /** @var Task[] $uncompletedTasks */
        $uncompletedTasks = Task::uncompleted()->get();
        foreach ($uncompletedTasks as $task) {
            /** @var User $doer */
            $doer = $employees->random();
            if ($doer->is($task->user)) {
                continue;
            }

            TaskReassigned::dispatch(
                $task->task_guid,
                $doer->public_id,
            );
        }

        return redirect()->route('tasks.index');
    }
}
