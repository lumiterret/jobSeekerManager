<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $vacanciesDraftCount = Vacancy::whereStatus('draft')->count();
        $vacanciesActiveCount = Vacancy::whereStatus('active')->count();
        return view(
            'dashboard',
            compact(
                'vacanciesDraftCount',
                'vacanciesActiveCount'
            )
        );
    }
}
