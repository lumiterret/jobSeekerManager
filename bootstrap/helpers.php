<?php

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;

function user(): Authenticatable|User|null
{
    return auth()->user();
}
