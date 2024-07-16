<?php

use App\Http\Controllers\app\HomeController;
use App\Http\Controllers\app\HumanController;
use App\Http\Controllers\app\RodovoeDrevoController;
use App\Http\Controllers\web\WebController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('humans', HumanController::class);
    Route::get('/rodovoe-drevo/{human}', [RodovoeDrevoController::class, 'index'])->name('rodovoe-drevo.index');
    Route::get('/rodovoe-drevo/{human}/{link}', [RodovoeDrevoController::class, 'index'])->name('rodovoe-drevo.link');
});

Auth::routes();

Route::get('/', [WebController::class, 'index'])->name('web.index');
Route::get('/rodovoe-drevo/{human}/{link}', [RodovoeDrevoController::class, 'index'])
    ->name('rodovoe-drevo.link');
