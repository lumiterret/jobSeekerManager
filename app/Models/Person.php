<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'f_name',
        'l_name',
        'position',
    ];

    public function getFullNameAttribute()
    {
        return "{$this->f_name} {$this->l_name}";
    }
}
