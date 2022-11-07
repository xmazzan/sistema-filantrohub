<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware([
	'auth:sanctum',
	config('jetstream.auth_session'),
	'verified',
])->group(function () {

    Route::get('/Create', function () {
        return Inertia::render('Create');
    })->name('create');

    Route::get('/Edit', function () {
        return Inertia::render('Edit');
    })->name('edit');

    Route::get('/MyProjects', function() {
        return Inertia::render('Projects');
    })->name('project');

});

/*Route::get('/Create', function () {
    return Inertia::render('Create');
})->name('create');*/

/*Route::get('/Edit', function () {
    return Inertia::render('Edit');
})->name('edit');*/
