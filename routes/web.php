<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AccountController;

Route::get('/', function () {
    return view('main');
})->name('credit.form');
Route::get('/', [FormController::class, 'showForm'])->name('credit.form');
Route::post('/formSubmit', [FormController::class, 'submit'])->name('form.submit');

// Добавьте это, если у вас еще нет Auth маршрутов
Auth::routes();

// Добавляем маршрут для личного кабинета
Route::get('/account', [AccountController::class, 'index'])->name('account')->middleware('auth');
