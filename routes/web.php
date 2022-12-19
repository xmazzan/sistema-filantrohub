<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/Know', [ProjectController::class, 'index'])->name('know');

Route::get('/project/show/{project}', [ProjectController::class, 'show'])->name('show');
//Route::put('/projects/{project}', [ProjectController::class, 'show'])->name('show');
Route::get('/test', [ProjectController::class, 'test'])->name('test');
//Route::get('/filtro', [ProjectController::class, 'getProjects'])->name('filtro');

Route::middleware([
	'auth:sanctum',
	config('jetstream.auth_session'),
	'verified',
])->group(function () {

    Route::post('/', [DashboardController::class, 'index'])->name('index');
    Route::get('/Create', [ProjectController::class, 'create'])->name('create');
    Route::get('/Edit', [ProjectController::class, 'editPage'])->name('editPage');
    Route::get('/Projects', [ProjectController::class, 'show1'])->name('project');
    Route::get('/project/edit/{project}', [ProjectController::class, 'edit'])->name('edit'); 
    Route::as('projects.')->group(function () {
        Route::post('/projects', [ProjectController::class, 'store'])->name('store');
        Route::get('/panel', [ProjectController::class, 'panel'])->name('panel'); // profile/dashboard
        Route::delete('/project/{id}', [ProjectController::class, 'destroy'])->name('destroy');//acessar evento pelo id events/{id}
        Route::get('/project/edit/{id}', [ProjectController::class, 'edit'])->name('edit');
        Route::put('/project/update/{id}', [ProjectController::class, 'update'])->name('update');
        Route::put('/project/update/{id}', [ProjectController::class, 'update'])->name('update');
        Route::get('/project/join/{project}',[ProjectController::class, 'joinProject'])->name('joinProject');
    });

});
