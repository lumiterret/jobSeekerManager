<?php

namespace App\Console\Commands\CronJobs;

use Illuminate\Console\Command;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Throwable;

abstract class AbstractScheduleCommand extends Command
{
    /**
     * Канал логгера по умолчанию
     */
    private const CRON_LOGGER_CHANNEL = 'cron-job';

    /**
     * @var float
     */
    private float $executionAt;

    /**
     * @throws Throwable
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $this->executionAt = microtime(true);

            $result = parent::execute($input, $output);

            $this->cronLogger()->debug("Задача '{$this->description}' завершила работу за {$this->calculateExecutionTime()} сек.");
            return $result;
        } catch (Throwable $e) {
            $this->cronLogger()->error("При выполнении задачи '{$this->description}' возникла ошибка!", compact('e'));
            throw $e;
        }
    }

    /**
     * @return float
     */
    private function calculateExecutionTime(): float
    {
        return round(microtime(true) - $this->executionAt, 2);
    }

    /**
     * @return LoggerInterface
     */
    private function cronLogger(): LoggerInterface
    {
        return logger()->channel(self::CRON_LOGGER_CHANNEL);
    }
}
