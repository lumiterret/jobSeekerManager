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

Route::get('/', [Controllers\MainController::class, 'index'])->name('home');

Route::resource('vacancies', Controllers\VacancyController::class)
    ->parameters(['vacancies' => 'id'])
    ->only(['index', 'show', 'create', 'store', 'edit', 'update']);
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
    ->only(['show', 'update']);

Route::post('vacancies/{vacancies}/add-contacts', [Controllers\VacancyController::class, 'assignPeople'])
    ->name('vacancies.assign-people');
Route::post('vacancies/appointment-create', [Controllers\AppointmentController::class, 'store'])
    ->name('vacancies.appointment-create');
Route::put('vacancies/status-change', [Controllers\VacancyController::class, 'changeStatus'])
    ->name('vacancies.status-change');

Route::put('appointments/status-change', [Controllers\AppointmentController::class, 'changeStatus'])
    ->name('appointments.status-change');
