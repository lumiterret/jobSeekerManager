<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    public const STATUS_APPOINTED = 'appointed';
    public const STATUS_EXPIRED = 'expired';
    public const STATUS_DONE = 'done';

    protected $fillable = [
        'vacancy_id',
        'is_all_day',
        'date',
        'title',
        'description',
        'meeting',
    ];

    protected $casts = [
        'date' => 'datetime'
    ];

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }

    public function statuses()
    {
        return [
            self::STATUS_APPOINTED,
            self::STATUS_DONE,
            self::STATUS_EXPIRED,
        ];
    }
}
