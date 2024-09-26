<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers;

Route::resource('coordinators', CoordinatorController::class)->names('coordinators');
Route::get('/add_sections/{sede}', [CoordinatorController::class, 'add_sections'])->name('add_sections');
Route::get('/add_teachers/{sede}', [CoordinatorController::class, 'add_teachers'])->name('add_teachers');
Route::get('/create_lectivo/{sede}', [CoordinatorController::class, 'create_lectivo'])->name('create_lectivo');
Route::get('/add_teachers_to_lectivo/{sede}', [CoordinatorController::class, 'add_teachers_to_lectivo'])->name('add_teachers_to_lectivo');
Route::get('/add_teacher_to_course/{lectivo}', [CoordinatorController::class, 'add_teacher_to_course'])->name('add_teacher_to_course');


// Route::get('/list_of_course/{lectivo}', [CoordinatorController::class, 'list_of_course'])->name('list_of_course');



