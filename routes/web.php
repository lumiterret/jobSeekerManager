<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('auth/login', [Controllers\AuthController::class, 'login'])
        ->name('login');

    Route::post('auth/login', [Controllers\AuthController::class, 'authenticate'])
        ->name('authenticate');
});

Route::middleware('auth')->group(function () {
    Route::get('/auth/logout', [Controllers\AuthController::class, 'logout'])
        ->name('logout');

    Route::get('/', [Controllers\MainController::class, 'index'])->name('home');

    Route::prefix('control/')->group(function () {
        Route::resource('users', Controllers\UserController::class)
            ->parameters(['users' => 'id'])
            ->only(['index', 'show', 'create', 'store', 'update']);
        Route::resource('cron-jobs', Controllers\CronJobController::class)
            ->only(['index', 'create', 'store', 'edit', 'update']);
        Route::get('cron-jobs/execute/{cron_job}', [Controllers\CronJobController::class, 'executeCronJob'])
            ->name('cron-jobs.execute');
    });

    Route::resource('employers', Controllers\EmployerController::class)
        ->parameters(['employers' => 'id'])
        ->only(['index', 'show', 'create', 'store', 'edit', 'update']);
    Route::resource('people', Controllers\PersonController::class)
        ->parameters(['people' => 'id'])
        ->only(['index', 'show', 'create', 'store', 'update']);
    Route::resource('contact', Controllers\ContacController::class)
        ->parameters(['contact' => 'id'])
        ->only(['store', 'destroy']);
    Route::resource('appointments', Controllers\AppointmentController::class)
        ->parameters(['appointments' => 'id'])
        ->only(['index','show', 'update']);

    Route::prefix('vacancies/')->group(function () {
        Route::post('{vacancies}/add-contacts', [Controllers\VacancyController::class, 'assignPeople'])
            ->name('vacancies.assign-people');
        Route::post('appointment-create', [Controllers\AppointmentController::class, 'store'])
            ->name('vacancies.appointment-create');
        Route::put('status-change', [Controllers\VacancyController::class, 'changeStatus'])
            ->name('vacancies.status-change');
    });
    Route::resource('vacancies', Controllers\VacancyController::class)
        ->parameters(['vacancies' => 'id'])
        ->only(['index', 'show', 'create', 'store', 'update']);

    Route::put('appointments/status-change', [Controllers\AppointmentController::class, 'changeStatus'])
        ->name('appointments.status-change');
});
