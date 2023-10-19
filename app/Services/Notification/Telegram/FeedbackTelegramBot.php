<?php

namespace App\Services\Notification\Telegram;

class FeedbackTelegramBot extends AbstractTelegramBot
{

    /**
     * @inheritDoc
     */
    protected function getToken(): string
    {
        return config('services.notification.telegram.feedback_bot.token');
    }

    /**
     * @inheritDoc
     */
    protected function getTargetChatIds(): array
    {

        return array_filter(explode(',', config('services.notification.telegram.feedback_bot.chat_ids')));
    }
}
