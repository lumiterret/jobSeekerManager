<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vacancy extends Model
{
    use HasFactory, SoftDeletes;

    public const STATUS_DRAFT = 'draft';
    public const STATUS_ACTIVE = 'active';
    public const STATUS_DONE = 'done';
    public const STATUS_ARCHIVE = 'archive';

    protected $fillable = [
        'title',
        'description',
        'is_favorite',
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function people()
    {
        return $this->belongsToMany(Person::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class)->orderByDesc('date');
    }

    public function lastAppointment()
    {
        return $this->hasMany(Appointment::class)->orderByDesc('date')->first();
    }

    public function statuses()
    {
        return [
            self::STATUS_DRAFT,
            self::STATUS_ACTIVE,
            self::STATUS_DONE,
            self::STATUS_ARCHIVE,
        ];
    }
}
