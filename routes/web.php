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



//Authenticated

Route::middleware([
	'auth:sanctum',
	config('jetstream.auth_session'),
	'verified',
])->group(function () {

    Route::get('/project/{project}', [ProjectController::class, 'edit'])->name('edit');
    Route::as('projects.')->group(function () {
        Route::post('/projects', [ProjectController::class, 'store'])->name('store');
        Route::get('/myProject', [ProjectController::class, 'myProject'])->name('myProject'); 
        Route::put('/projects/{project}', [ProjectController::class, 'show'])->name('show');
        Route::delete('/project/{id}', [ProjectController::class, 'destroy'])->name('destroy');//acessar evento pelo id events/{id}
       
        Route::put('/project/update/{id}', [ProjectController::class, 'update'])->name('update');
        Route::post('/project/join/{id}',[ProjectController::class, 'joinEvent'])->name('joinEvent'); //presente na /events/DASHBOARD.blade.php join==signIn action EventController
        Route::delete('/project/leave/{id}',[ProjectController::class, 'leaveEvent'])->name('leaveEvent');     
    });
});