<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $user = user();
        $vacanciesDraftCount = Vacancy::whereStatus('draft')->whereUserId($user->id)->count();
        $vacanciesActiveCount = Vacancy::whereStatus('active')->whereUserId($user->id)->count();
        return view(
            'dashboard',
            compact(
                'vacanciesDraftCount',
                'vacanciesActiveCount'
            )
        );
    }
}
