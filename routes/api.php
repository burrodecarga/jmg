<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/users', function (Request $request) {
    return datatables()->of(User::with('roles'))
        ->addColumn('btn', 'super.users.actions')
        ->rawColumns(['btn'])
        ->toJson();
});

Route::get('/manager', function (Request $request) {
    return datatables()->of(User::with('roles'))
        //    ->addColumn('btn', 'admin.sedes.actions')
        //    ->rawColumns(['btn'])
        ->toJson();
});
