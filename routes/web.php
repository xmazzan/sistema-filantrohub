<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjetoController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

Route::get('/', [DashboardController::class, 'show'])->name('dashboard');

Route::middleware([
	'auth:sanctum',
	config('jetstream.auth_session'),
	'verified',
])->group(function () {

    Route::post('/', [DashboardController::class, 'index'])->name('index');

    Route::get('/Create', [ProjetoController::class, 'create'])->name('create');

    Route::get('/Edit', [ProjetoController::class, 'edit'])->name('edit');

    Route::get('/MyProjects', [ProjetoController::class, 'show'])->name('project');

});