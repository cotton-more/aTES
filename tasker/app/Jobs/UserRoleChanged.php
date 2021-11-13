<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;

class UserRoleChanged implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    public function __construct(private array $data)
    {
    }

    public function handle()
    {
        $user = User::query()->where('public_id', $this->data['public_id'] ?? null)->first();
        if ($user !== null) {
            $user->role = $this->data['role'] ?? null;
            $user->save();
        }
    }
}
