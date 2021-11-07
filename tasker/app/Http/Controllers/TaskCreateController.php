<?php

namespace App\Http\Controllers;

use App\Models\User;

class TaskCreateController extends Controller
{
    public function __invoke()
    {
        $users = User::query()->where('role', 'employee')->get();

        return view('tasks.create', [
            'users' => $users,
        ]);
    }
}
