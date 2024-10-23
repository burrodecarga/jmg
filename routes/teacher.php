<?php

use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

//app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
Route::resource('teachers', TeacherController::class)->names('teachers');
Route::get('teachers/course/{teacher}/{lectivo}', [TeacherController::class, 'course'])->name('course');
