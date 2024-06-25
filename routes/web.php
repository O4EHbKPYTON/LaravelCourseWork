<?php

// routes/web.php
use App\Http\Controllers\FormController;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [FormController::class, 'showForm'])->name('credit.form');
Route::post('/formSubmit', [FormController::class, 'submit'])->name('form.submit');

Auth::routes();

Route::get('/account', [AccountController::class, 'index'])->name('account')->middleware('auth');
Route::post('/makePayment', [FormController::class, 'makePayment'])->name('make_payment')->middleware('auth');
Route::get('/admin/credits', [AccountController::class, 'adminCredits'])->name('admin.credits')->middleware('role:admin');
