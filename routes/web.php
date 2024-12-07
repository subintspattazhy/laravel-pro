<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClassroomController;

Route::middleware('auth')->group(function() {
    Route::get('/', [DashboardController::class, 'index']);

    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/api/users', [UserController::class, 'getUsers'])->name('users.get');
    Route::get ('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit'); 
    Route::put('/users/{id}/update', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}/delete', [UserController::class, 'delete'])->name('users.delete'); 
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');


    Route::get('/classes', [ClassroomController::class, 'index'])->name('classroom');
    Route::get('/api/classes', [ClassroomController::class, 'getClasses'])->name('classes.get');
    Route::get ('/classes/create', [ClassroomController::class, 'create'])->name('classroom.create');
    Route::post('/classes/store', [ClassroomController::class, 'store'])->name('classroom.store');
    Route::get('/classes/{class}/edit', [ClassroomController::class, 'edit'])->name('classroom.edit');
    Route::put('/classes/{class}/update',[ClassroomController::class, 'update'])->name('classroom.update');
    Route::delete('/classes/{classes}', [ClassroomController::class, 'delete'])->name('classroom.delete');

    Route::get('/students', [StudentsController::class, 'index'])->name('students');
    Route::get('/api/students', [StudentsController::class, 'getStudents'])->name('students.get');
    Route::get ('/students/create', [StudentsController::class, 'create'])->name('students.create');
    Route::post('/students/store', [StudentsController::class, 'store'])->name('students.store');
    Route::get('/students/{student}/edit', [StudentsController::class, 'edit'])->name('students.edit');
    Route::put('/students/{student}/update',[StudentsController::class, 'update'])->name('students.update');
    Route::delete('/students/{student}', [StudentsController::class, 'delete'])->name('students.delete');
    
    Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');
});

Route::get('/customers', [DashboardController::class, 'index']);

require_once 'auth.php';