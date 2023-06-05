<?php

namespace App\Commands;

use App\Facades\Chat;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class ChatCommand extends Command
{
    protected $signature = 'chat {prompt?}';
    protected $description = 'Chat with Hal.';

    public function handle()
    {
        $this->info(Chat::completion($this->argument('prompt')));
    }

    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
