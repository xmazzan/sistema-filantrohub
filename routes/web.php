<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjetoController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

Route::get('/', [DashboardController::class, 'show'])->name('dashboard');

Route::get('/Know', [ProjetoController::class, 'index'])->name('know');

Route::get('/project/{project}', [ProjetoController::class, 'show'])->name('show');
//Route::put('/projects/{project}', [ProjetoController::class, 'show'])->name('show');
Route::get('/test', [ProjetoController::class, 'test'])->name('test');
Route::get('/filtro', [ProjetoController::class, 'getProjects'])->name('filtro');

Route::middleware([
	'auth:sanctum',
	config('jetstream.auth_session'),
	'verified',
])->group(function () {

    Route::post('/', [DashboardController::class, 'index'])->name('index');
    Route::get('/Create', [ProjetoController::class, 'create'])->name('create');
    Route::get('/Edit', [ProjetoController::class, 'editPage'])->name('editPage');
    Route::get('/Projects', [ProjetoController::class, 'show1'])->name('project');
    Route::get('/project/{project}', [ProjetoController::class, 'edit'])->name('edit'); 
    Route::as('projects.')->group(function () {
        Route::post('/projects', [ProjetoController::class, 'store'])->name('store');
        Route::get('/panel', [ProjetoController::class, 'panel'])->name('panel'); // profile/dashboard
        Route::delete('/project/{id}', [ProjetoController::class, 'destroy'])->name('destroy');//acessar evento pelo id events/{id}
        Route::get('/project/edit/{id}', [ProjetoController::class, 'edit'])->name('edit');
        Route::put('/project/update/{id}', [ProjetoController::class, 'update'])->name('update');
        Route::put('/project/{projetos}', [ProjetoController::class, 'show'])->name('show');
        Route::put('/project/update/{id}', [ProjetoController::class, 'update'])->name('update');
        Route::get('/project/join/{project}',[ProjetoController::class, 'joinProject'])->name('joinProject');
    });

});
