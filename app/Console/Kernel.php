<?php

namespace App\Console;

use App\Models\CronJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $jobs = CronJob::query()->where('is_active', true)->get();

        foreach ($jobs as $job) {
            $schedule->command($job->command)
                ->name($job->description)
                ->cron($job->schedule_time)
                ->withoutOverlapping()
                ->runInBackground();
        }
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');
        $this->load(__DIR__.'/Commands/CronJobs');

        require base_path('routes/console.php');
    }
}
