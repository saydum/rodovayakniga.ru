<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HumanController;
use App\Http\Controllers\RodController;
use App\Http\Controllers\RodovoeDrevoController;
use App\Http\Controllers\Web\WebController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () { //'check.access.human.data'

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/tree/{rod}', [RodovoeDrevoController::class, 'index'])
        ->name('tree');
    Route::get('/test/{rod}', [RodovoeDrevoController::class, 'test'])
        ->name('test');

    Route::resource('roda', RodController::class);

    Route::resource('humans', HumanController::class);

    Route::get('/rodovoe-drevo/{human}', [RodovoeDrevoController::class, 'index'])
        ->name('rodovoe-drevo.index');

    Route::get('/rodovoe-drevo/{human}/{link}', [RodovoeDrevoController::class, 'index'])
        ->name('rodovoe-drevo.link');
});

Auth::routes();

Route::get('/', [WebController::class, 'index'])->name('web.index');
Route::get('/rodovoe-drevo/{human}/{link}', [RodovoeDrevoController::class, 'index'])
    ->name('rodovoe-drevo.link');
