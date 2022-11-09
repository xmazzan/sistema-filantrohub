<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
*/
Route::get('/Dashboard', [DashboardController::class, 'index'])->name('dashboard');

//Route::get('/Dashboard.vue', function () {
//    return Inertia::render('Dashboard');
//})->name('dashboard');

Route::get('/Create.vue', function () {
    return Inertia::render('Create');
})->name('create');

//Authenticated
/*
Route::middleware([
	'auth:sanctum',
	config('jetstream.auth_session'),
	'verified',
])->group(function () {
    Route::get('/dashboard', [EventController::class, 'dashboard'])->name('dashboard'); // profile/dashboard
    Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('destroy');//acessar evento pelo id events/{id}
    Route::get('events/edit/{id}', [EventController::class, 'edit'])->name('edit');
    Route::put('events/update/{id}', [EventController::class, 'update'])->name('update');
    Route::post('/events/join/{id}',[EventController::class, 'joinEvent'])->name('joinEvent'); //presente na /events/DASHBOARD.blade.php join==signIn action EventController
    Route::delete('/events/leave/{id}',[EventController::class, 'leaveEvent'])->name('leaveEvent');
});
*/