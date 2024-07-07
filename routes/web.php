<?php

use App\Http\Controllers\HumanController;
use App\Http\Controllers\RodovoeDrevoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('humans', HumanController::class);

Route::get('/rodovoe-drevo/{human}', [RodovoeDrevoController::class, 'index'])->name('rodovoe-drevo.index');
Route::get('/rodovoe-drevo/{human}/{link}', [RodovoeDrevoController::class, 'index'])->name('rodovoe-drevo.index');
