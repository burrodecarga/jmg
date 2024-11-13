<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

Route::get('administrators.index', [AdminController::class, 'index'])->name('administrators.index');
