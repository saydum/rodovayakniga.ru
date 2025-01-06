<?php

use App\Http\Controllers\HumanController;
use App\Http\Controllers\RodController;
use App\Http\Controllers\RodovoeDrevoController;
use App\Http\Controllers\Web\WebController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'check.access.human.data'])->group(function () {

    Route::get('/app', [RodovoeDrevoController::class, 'index'])
        ->name('app');
    Route::get('/test', [RodovoeDrevoController::class, 'test'])
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
