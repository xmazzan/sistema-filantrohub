<?php

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
Route::get('/', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::get('/Create.vue', function () {
    return Inertia::render('Create');
})->name('create');

Route::get('/Edit.vue', function () {
    return Inertia::render('Edit');
})->name('edit');

Route::get('/Login.vue', function () {
    return Inertia::render('Login');
})->name('login');

Route::get('/Register', function () {
    return Inertia::render('Register');
})->name('register');
