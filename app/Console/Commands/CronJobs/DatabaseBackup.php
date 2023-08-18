<?php

namespace App\Console\Commands\CronJobs;


use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class DatabaseBackup extends AbstractScheduleCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'dbBackup';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dbName = env('DB_DATABASE', 'js_manager');
        $this->line('backup database' . $dbName);
        $fileName = $dbName.'_'.date('Y-m-d_His');
        $fileExt = 'sql.gz';
        $file = $fileName.'.'.$fileExt;
        $backupFolder = 'app/backup/database';
        $backupPath = $backupFolder.'/'.$file;

        $this->mySqlDump($dbName, $backupFolder, $file);

        $isFileExists = Storage::disk('local')->exists($backupPath);

        if (! $isFileExists) {
            $this->line('file not exists');
        }
    }

    private function mysqlDump($dbName, $folder, $file)
    {
        $path = storage_path($folder);

        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        $mySqlDump = 'mysqldump -h '.env('DB_HOST').' -u '.env('DB_USERNAME').' -p'.env('DB_PASSWORD');

        $process = Process::fromShellCommandline($mySqlDump.' '.$dbName.' --quick | gzip > "'.$path.'/'.$file.'"');

        $process->setPTY(true);
        $process->run();

        // executes after the command finishes
        if (! $process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        return $path;

    }
}
