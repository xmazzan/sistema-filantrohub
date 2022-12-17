<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProjectController;

/*Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
*/


Route::get('/', [ProjectController::class, 'index'])->name('dashboard'); //o name é o nome que usamos na pagina vue(ex:applayout)

Route::get('/Create', function () {
    return Inertia::render('Create');
})->name('create');

Route::get('/project/{project}', [ProjectController::class, 'show'])->name('show');


//Authenticated
//Route::get('/seila', function() {
//    return Inertia::Render('Create');
//});

Route::middleware([
	'auth:sanctum',
	config('jetstream.auth_session'),
	'verified',
])->group(function () {
    //Route::get('/panel', [ProjectController::class, 'panel'])->name('panel'); //GERA OUTRA
    Route::get('/project/{project}', [ProjectController::class, 'edit'])->name('edit');
    Route::as('projects.')->group(function () {
        Route::get('/panel', [ProjectController::class, 'panel'])->name('panel');
        Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('show');
        Route::post('/projects', [ProjectController::class, 'store'])->name('store');
        Route::delete('/project/{project}', [ProjectController::class, 'destroy'])->name('destroy');//acessar evento pelo id events/{id}
        //Route::get('/project/edit/{id}', [ProjectController::class, 'edit'])->name('edit');
        Route::put('/project/update/{id}', [ProjectController::class, 'update'])->name('update');
        //Route::post('/project/join/{project}',[ProjectController::class, 'joinProject'])->name('joinProject'); //presente na /events/DASHBOARD.blade.php join==signIn action EventController
        Route::get('/project/join/{project}',[ProjectController::class, 'joinProject'])->name('joinProject');
        Route::delete('/project/leave/{id}',[ProjectController::class, 'leaveProject'])->name('leaveProject');     
    });
});