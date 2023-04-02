<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public const PHONE_TYPE = 'phone';
    public const EMAIL_TYPE = 'email';
    public const WHATSAPP_TYPE = 'whatsapp';
    public const TELEGRAM_TYPE = 'telegram';
    public const URL_TYPE = 'url';

    protected $fillable = [
        'type',
        'value',
    ];

    public function types(): array
    {
        return [
            self::EMAIL_TYPE,
            self::PHONE_TYPE,
            self::WHATSAPP_TYPE,
            self::TELEGRAM_TYPE,
            self::URL_TYPE,
        ];
    }
}
