<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];

    public function vacancies()
    {
        return $this->hasMany(Vacancy::class);
    }
}
