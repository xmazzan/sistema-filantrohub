<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::get('/Login.vue', function () {
    return Inertia::render('Login');
})->name('login');

Route::get('/Register', function () {
    return Inertia::render('Register');
})->name('register');

Route::middleware([
	'auth:sanctum',
	config('jetstream.auth_session'),
	'verified',
])->group(function () {

    Route::get('/Create.vue', function () {
        return Inertia::render('Create');
    })->name('create');

    Route::get('/Edit.vue', function () {
        return Inertia::render('Edit');
    })->name('edit');

});

/*Route::get('/Create.vue', function () {
    return Inertia::render('Create');
})->name('create');*/

/*Route::get('/Edit.vue', function () {
    return Inertia::render('Edit');
})->name('edit');*/