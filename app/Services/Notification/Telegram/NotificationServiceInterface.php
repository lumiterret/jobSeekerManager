<?php

namespace App\Services\Notification\Telegram;

use App\Notifications\Telegram\TelegramNotificationMessageInterface;

interface NotificationServiceInterface
{
    public function notify(TelegramNotificationMessageInterface $message): void;
}
