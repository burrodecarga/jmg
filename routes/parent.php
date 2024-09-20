<?php

use App\Http\Controllers\PadreController;
use Illuminate\Support\Facades\Route;


    Route::get('padres', [PadreController::class, 'index'])->name('padres.index');
    Route::post('padres/{user}/asignar', [PadreController::class, 'asignar'])->name('padres.asignar');
    Route::get('padres/stop', [PadreController::class, 'stop'])->name('padres.stop');




