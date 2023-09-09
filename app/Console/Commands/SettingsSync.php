<?php

namespace App\Console\Commands;

use App\Models\CronJob;
use App\Models\Option;
use Illuminate\Console\Command;

class SettingsSync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:settings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Синхронизация настроек';

    private $cronJobs = [
        [
            'command' => 'db:backup',
            'description' => 'Бекап базы',
            'schedule_time' => '0 2 * * *',
        ],
        [
            'command' => 'appointments:status_change',
            'description' => 'Автоматическое изменение статуса. Статус назначения дата которых старше пяти дней меняется на "Expired"',
            'schedule_time' => '0 2 * * *',
        ],
    ];

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if ($this->confirm('Sync cron jobs?')) {
            $this->syncCronJobs();
        }
    }

    private function syncCronJobs()
    {
        $this->info('Синхронизируем задания крон');
        foreach ($this->cronJobs as $row) {
            $cronJob = CronJob::firstOrNew(['command' => $row['command']]);
            if ($cronJob->id === null) {
                $this->info('Добавляем задание ' . $row['command']);
                $cronJob->command = $row['command'];
                $cronJob->description = $row['description'];
                $cronJob->schedule_time = $row['schedule_time'];
                $cronJob->save();
            } else {
                $this->info('Задание ' . $row['command'] . ' уже имеется');
            }
        }
    }
}
