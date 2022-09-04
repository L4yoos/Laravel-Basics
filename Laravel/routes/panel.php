<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ShoppingController;

Route::get('', [HomeController::class, 'index'])->name('panel');

Route::get('sklep/', [ShoppingController::class, 'index'])->name('shopping');

Route::get('sklep/admin', [ShoppingController::class, 'admin'])->name('shopping.admin');

Route::put('sklep/admin/add/{shoptool}', [ShoppingController::class, 'update'])->name('shopping.admin.add');

Route::put('sklep/buy/{shoptool}', [ShoppingController::class, 'store'])->name('shopping.buy');

Route::get('newsletter/', [NewsletterController::class, 'index'])->name('newsletter');

Route::put('newsletter/create', [NewsletterController::class, 'store'])
    ->name('newsletter.store');

Route::get('{user}', [HomeController::class, 'delete'])->name('user.delete');

Route::get('show/{user}', [HomeController::class, 'show'])->name('user.show');

Route::put('update/{user}', [HomeController::class, 'update'])
    ->middleware(['can:update,user'])
    ->name('user.update');
