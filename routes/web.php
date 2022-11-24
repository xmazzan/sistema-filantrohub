<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjetoController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

Route::get('/', [DashboardController::class, 'show'])->name('dashboard');

Route::get('/Know', [ProjetoController::class, 'index'])->name('know');

Route::middleware([
	'auth:sanctum',
	config('jetstream.auth_session'),
	'verified',
])->group(function () {

    Route::post('/', [DashboardController::class, 'index'])->name('index');

    Route::get('/Create', [ProjetoController::class, 'create'])->name('create');

    Route::get('/Edit', [ProjetoController::class, 'editPage'])->name('editPage');

    Route::get('/Projects', [ProjetoController::class, 'show'])->name('project');

    /*Route::as('projects.')->group(function () {
        Route::get('/Know', [ProjetoController::class, 'panel'])->name('panel');
        Route::delete('/project/{id}', [ProjetoController::class, 'destroy'])->name('destroy');
        Route::get('/project/edit/{id}', [ProjetoController::class, 'edit'])->name('edit');
        Route::put('/project/update/{id}', [ProjetoController::class, 'update'])->name('update');
        //Route::post('/project/join/{id}',[ProjectController::class, 'joinEvent'])->name('joinEvent'); 
        //Route::delete('/project/leave/{id}',[ProjectController::class, 'leaveEvent'])->name('leaveEvent');     
    });*/

});
