<?php

use Illuminate\Support\Facades\Route;
use App\Models\Grado;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\SchoolSedeController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\PadreController;
use App\Http\Controllers\ImpersonateController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {

        //$user = Auth::user();
        //dd($user->id, $user->representados, $user->representante);

        return view('dashboard');
    })->name('dashboard');

    Route::get('/grados_json', function () {
        $grados = Grado::all();
        return $grados;
    });
});




Route::group(['middleware' => ['auth']], function () {
    Route::post('impersonate/{user}/start', [ImpersonateController::class, 'start'])->name('impersonate.start');
    Route::get('impersonate/stop', [ImpersonateController::class, 'stop'])->name('impersonate.stop');

    Route::resource('books', BookController::class)->names('books');
});
