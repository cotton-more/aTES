<?php

namespace App\Jobs;

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

    }
}
