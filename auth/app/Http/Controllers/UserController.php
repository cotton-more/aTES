<?php

namespace App\Http\Controllers;

use App\Jobs\UserRoleChanged;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use function view;

class UserController extends Controller
{
    public function index(): View
    {
        return view('users.index', [
            'users' => User::all(),
        ]);
    }

    public function edit(User $user): View
    {
        $roles = [
            'employee',
            'manager',
            'admin',
        ];
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $role = $request->get('role');

        $user->role = $role ?: null;
        $user->save();

        UserRoleChanged::dispatch([
            'public_id' => $user->public_id,
            'role' => $user->role,
        ])->onQueue('users-stream');

        return redirect()->route('users.index');
    }
}
