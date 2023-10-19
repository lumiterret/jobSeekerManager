<?php

namespace App\Services\Notification\Telegram;

use App\Notifications\Telegram\TelegramNotificationMessageInterface;
use GuzzleHttp\Client;

abstract class AbstractTelegramBot implements NotificationServiceInterface
{
    private const BASE_URI = 'https://api.telegram.org';

    protected string $parseMode = 'html';

    public function notify(TelegramNotificationMessageInterface $message): void
    {
        if (!$this->getToken()) {
            return;
        }

        $client = $this->createClient();

        $uri = $this->getNotifyUri();
        foreach ($this->getTargetChatIds() as $chatId) {
            $client->post($uri, [
                'form_params' => [
                    'chat_id' => $chatId,
                    'parse_mode' => $this->parseMode,
                    'text' => $message->getContent(),
                ],
            ]);
        }
    }

    public function setParseMode(string $parseMode = 'html'): void
    {
        $this->parseMode = $parseMode;
    }

    private function getNotifyUri(): string
    {
        return sprintf('/bot%s/sendMessage', $this->getToken());
    }

    private function createClient(): Client
    {
        return new Client([
            'base_uri' => self::BASE_URI,
        ]);
    }

    /**
     * @return string
     */
    abstract protected function getToken(): string;

    /**
     * @return string[]
     */
    abstract protected function getTargetChatIds(): array;
}
