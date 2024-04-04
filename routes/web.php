<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [Controllers\MainController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {
    if(env('APP_ENV') === 'prod') {
        Route::get('/register', [Controllers\Auth\RegisterController::class, 'create'])
            ->name('register');
        Route::post('/register', [Controllers\Auth\RegisterController::class, 'store'])
            ->name('membership.create');
    }

    Route::get('/forgot-password', [Controllers\Auth\ForgotPasswordController::class, 'create'])
        ->name('password.request');
    Route::post('/forgot-password', [Controllers\Auth\ForgotPasswordController::class, 'store'])
        ->name('password.email');

    Route::get('/reset-password', [Controllers\Auth\ResetPasswordController::class, 'create'])
        ->name('password.reset');
    Route::post('/reset-password', [Controllers\Auth\ResetPasswordController::class, 'store'])
        ->name('password.update');

    Route::get('auth/login', [Controllers\Auth\LoginController::class, 'login'])
        ->name('login');
    Route::post('auth/login', [Controllers\Auth\LoginController::class, 'authenticate'])
        ->name('authenticate');
});

Route::middleware('auth')->group(function () {
    Route::get('/auth/logout', [Controllers\Auth\LoginController::class, 'logout'])
        ->name('logout');

    Route::get('/email/verify', [Controllers\Auth\EmailVerificationPromptController::class, '__invoke'])
        ->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [Controllers\Auth\VerifyEmailController::class, '__invoke'])
        ->middleware('signed')
        ->name('verification.verify');
    Route::post('/email/verification-notification', [Controllers\Auth\EmailVerificationNotificationController::class, '__invoke'])
        ->name('verification.send');

    Route::middleware('verified')->group(function () {
        Route::get('/dashboard', [Controllers\MainController::class, 'dashboard'])->name('dashboard');

        Route::prefix('control/')->group(function () {
            Route::resource('users', Controllers\UserController::class)
                ->parameters(['users' => 'id'])
                ->only(['index', 'show', 'create', 'store', 'update']);
            Route::resource('cron-jobs', Controllers\CronJobController::class)
                ->only(['index', 'create', 'store', 'edit', 'update']);
        Route::get('cron-jobs/execute/{cron_job}', [Controllers\CronJobController::class, 'executeCronJob'])
            ->name('cron-jobs.execute');
        });

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

        Route::prefix('employers/')->group(function () {
            Route::get('search', [Controllers\EmployerController::class, 'search']);
        });
        Route::resource('employers', Controllers\EmployerController::class)
            ->parameters(['employers' => 'id'])
            ->only(['index', 'show', 'create', 'store', 'edit', 'update']);

        Route::prefix('people/')->group(function () {
            Route::get('search', [Controllers\PersonController::class, 'search']);
        });
        Route::resource('people', Controllers\PersonController::class)
            ->parameters(['people' => 'id'])
            ->only(['index', 'show', 'create', 'store', 'update']);
        Route::resource('contact', Controllers\ContactController::class)
            ->parameters(['contact' => 'id'])
            ->only(['store', 'destroy']);

        Route::prefix('appointments/')->group(function () {
            Route::put('status-change', [Controllers\AppointmentController::class, 'changeStatus'])
                ->name('appointments.status-change');
            Route::get('calendar', [Controllers\AppointmentController::class, 'calendar'])
                ->name('appointments.calendar');
            Route::get('events', [Controllers\AppointmentController::class, 'events']);
        });
        Route::resource('appointments', Controllers\AppointmentController::class)
            ->parameters(['appointments' => 'id'])
            ->only(['index', 'show', 'update']);

        Route::get('feed-back', [Controllers\FeedBackController::class, 'create'])->name('feed-back.create');
        Route::post('feed-back', [Controllers\FeedBackController::class, 'store'])->name('feed-back.store');
    });
});
