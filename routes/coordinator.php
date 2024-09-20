<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers;

Route::resource('coordinators', CoordinatorController::class)->names('coordinators');
Route::get('/add_sections/{sede}', [CoordinatorController::class, 'add_sections'])->name('add_sections');
Route::get('/add_teachers/{sede}', [CoordinatorController::class, 'add_teachers'])->name('add_teachers');

