<?php

use App\Http\Controllers\GradoController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SchoolSedeController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::resource('roles', RoleController::class)->names('roles');
Route::resource('users', UserController::class)->names('users');
Route::resource('schools', SchoolController::class)->names('schools');
Route::resource('sedes', SedeController::class)->names('sedes');
Route::resource('rooms', RoomController::class)->names('rooms');
Route::resource('resources', ResourceController::class)->names('resources');
Route::resource('grados', GradoController::class)->names('grados');
Route::resource('schools.sedes', SchoolSedeController::class)->names('schools.sedes');
Route::get('/schools/sedes/{id}', [SchoolController::class, 'show_sede'])->name('schools.sedes.sede');
Route::get('/schools/sedes/room_create/{id}', [SchoolSedeController::class, 'room_create'])->name('schools.sedes.room_create');
Route::post('/schools/sedes/room_store', [SchoolSedeController::class, 'room_store'])->name('schools.sedes.room_store');
Route::get('/schools/sedes/manager_create/{id}', [SchoolSedeController::class, 'manager_create'])->name('schools.sedes.manager_create');
Route::get('/schools/sedes/grados_create/{id}', [SchoolSedeController::class, 'grados_create'])->name('schools.sedes.grados_create');
Route::post('/schools/sedes/grados_store', [SchoolSedeController::class, 'grados_store'])->name('schools.sedes.grados_store');

Route::get('rooms/create_resource/{id}', [RoomController::class, 'create_resource'])->name('rooms.create_resource');
