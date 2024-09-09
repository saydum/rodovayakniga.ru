<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\HumanController;
use App\Http\Controllers\RodovoeDrevoController;
use App\Http\Controllers\Web\WebController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('humans', HumanController::class)
        ->middleware('check.access.human.data');

    Route::get('/rodovoe-drevo', [RodovoeDrevoController::class, 'index'])
        ->name('rodovoe-drevo')
        ->middleware('check.access.human.data');

    Route::get('/rodovoe-drevo/{human}', [RodovoeDrevoController::class, 'index'])
        ->name('rodovoe-drevo.index')
        ->middleware('check.access.human.data');

    Route::get('/rodovoe-drevo/{human}/{link}', [RodovoeDrevoController::class, 'index'])
        ->name('rodovoe-drevo.link')
        ->middleware('check.access.human.data');
});

Auth::routes();

Route::get('/', [WebController::class, 'index'])->name('web.index');
Route::get('/rodovoe-drevo/{human}/{link}', [RodovoeDrevoController::class, 'index'])
    ->name('rodovoe-drevo.link');
