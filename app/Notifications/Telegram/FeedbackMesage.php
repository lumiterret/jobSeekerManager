<?php

namespace App\Notifications\Telegram;

use App\Models\Feedback;
use App\Models\User;

class FeedbackMesage implements TelegramNotificationMessageInterface
{
    private string $content = '';

    public function __construct(private Feedback $feedBack)
    {
        $this->prepareMessage();
    }

    public function getContent(): string
    {
        return $this->content;
    }

    private function prepareMessage(): void
    {
        $username = User::findOrFail($this->feedBack->user_id)->username;
        $this->content = implode("\r\n",[
            'Новый отзыв: ' . $this->feedBack->id,
            '',
            'Пользователь: ' . $username,
            'Комментарий: ' . $this->feedBack->content,
        ]);
    }
}
