<?php

namespace App\Console\Commands\CronJobs;


use App\Models\Appointment;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class AppointmentsStatusChange extends AbstractScheduleCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'appointments:status_change';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Автоматическое изменение статуса назначений.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //Выбираем из базы назначения со статусом "appointed" и если дата назначения старше пяти дней меняем статус на "expired"
        $appointments = Appointment::where('status', Appointment::STATUS_APPOINTED)->get();

        foreach ($appointments as $appointment) {
            if ($appointment->date < Carbon::now()->subDays(5)) {
                $appointment->status = Appointment::STATUS_EXPIRED;
                $appointment->save();
            }
        }
    }
}
