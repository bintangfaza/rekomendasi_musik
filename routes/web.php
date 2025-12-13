<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaguController;

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/', [DashboardController::class, 'index']);
Route::get('/lagu/{id}', [LaguController::class, 'detail'])->name('lagu.detail');
