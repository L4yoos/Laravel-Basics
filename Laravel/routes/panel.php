<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ThanksYouController;
use App\Http\Controllers\NotesController as Test;

Route::resource( 'notes', Test::class );

Route::get('', [HomeController::class, 'index'])->name('panel');

Route::get('{user}', [HomeController::class, 'delete'])->name('user.delete');

Route::get('show/{user}', [HomeController::class, 'show'])->name('user.show');

Route::put('update/{user}', [HomeController::class, 'update'])
    ->middleware(['can:update,user'])
    ->name('user.update');

Route::get('/send-thanksyou', [ThanksYouController::class, 'sendThanksyou']);

