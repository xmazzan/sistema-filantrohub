<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
*/
Route::get('/', [ProjectController::class, 'index'])->name('index');

Route::get('/create', function () {
    return Inertia::render('Create');
})->name('create');

Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('show');

//Authenticated

Route::middleware([
	'auth:sanctum',
	config('jetstream.auth_session'),
	'verified',
])->group(function () {
    Route::as('projects.')->group(function () {
        Route::post('/projects', [ProjectController::class, 'store'])->name('store');
        Route::get('/panel', [ProjectController::class, 'panel'])->name('panel'); // profile/dashboard
        Route::delete('/project/{id}', [ProjectController::class, 'destroy'])->name('destroy');//acessar evento pelo id events/{id}
        Route::get('/project/edit/{id}', [ProjectController::class, 'edit'])->name('edit');
        Route::put('/project/update/{id}', [ProjectController::class, 'update'])->name('update');
        Route::post('/project/join/{id}',[ProjectController::class, 'joinEvent'])->name('joinEvent'); //presente na /events/DASHBOARD.blade.php join==signIn action EventController
        Route::delete('/project/leave/{id}',[ProjectController::class, 'leaveEvent'])->name('leaveEvent');     
    });
});
