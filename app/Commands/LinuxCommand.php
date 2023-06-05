<?php

namespace App\Commands;

use App\Facades\Chat;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class LinuxCommand extends Command
{
    protected $signature = 'cmd {task?}';
    protected $description = 'Ask Hal what the Linux Command(s) are for a certain task.';

    public function handle()
    {
        $task = $this->argument('task');

        if (is_null($task))
            $task = $this->ask("Hello Dave. What do you want to do?");

        $cmd = Chat::completion("Give me just the linux command to \"{$task}\" without anything extra.");
        $this->info("The command to {$task} is: {$cmd}");

        if ($this->ask('Do you want me to run this command?')) {
            echo shell_exec($cmd);
        }
    }

    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
