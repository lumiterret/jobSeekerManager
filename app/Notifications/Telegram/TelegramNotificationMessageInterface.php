<?php

namespace App\Notifications\Telegram;

interface TelegramNotificationMessageInterface
{
    public function getContent(): string;
}
