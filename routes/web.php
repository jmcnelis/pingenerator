<?php

    use Illuminate\Support\Facades\Route;
    use Jmcnelis\PinGenerator\Http\Controllers\PinController;

    Route::get('/pins', [PinController::class, 'index'])->name('pins.index');
    Route::get('/pins/{pin}', [PinController::class, 'show'])->name('pins.show');
    Route::post('/pins', [PinController::class, 'store'])->name('pins.store');
    Route::get('/pins/palindrome/{pin}', [PinController::class, 'palindrome'])->name('pins.palindrome');
    Route::get('/pins/sequential/{pin}', [PinController::class, 'sequential'])->name('pins.sequential');
    Route::get('/pins/repeating/{pin}', [PinController::class, 'repeating'])->name('pins.repeating');
