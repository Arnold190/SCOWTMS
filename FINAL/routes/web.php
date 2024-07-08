<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::group(['middleware' => 'auth'], function () {
    
        // Task routes
        Route::get('/tasks', [TasksController::class, 'index'])->name('tasks.index');
        Route::get('/tasks/create', [TasksController::class, 'create'])->name('tasks.create');
        Route::post('/tasks', [TasksController::class, 'store'])->name('tasks.store');
        Route::get('/tasks/{task}', [TasksController::class, 'show'])->name('tasks.show');
        Route::put('/tasks/{task}', [TasksController::class, 'edit'])->name('tasks.edit');
        Route::delete('/tasks/{task}', [TasksController::class, 'destroy'])->name('tasks.destroy');

        Route::resource('users', \App\Http\Controllers\UsersController::class);
    });

    //Route::post('/tasks', [TasksController::class, 'store'])->name('tasks.store');


});
