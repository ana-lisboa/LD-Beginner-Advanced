<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ClientController;
use \App\Http\Controllers\ProjectController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])
    ->name('dashboard');

Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::resource('clients', ClientController::class,
    )->except(['show'])
    ->names('admin.clients');

    Route::resource('projects', ProjectController::class,
    )->except(['show'])
    ->names('admin.projects');

    Route::resource('tasks', TaskController::class,
    )->except(['show'])
    ->names('admin.tasks');

});

require __DIR__ . '/auth.php';
