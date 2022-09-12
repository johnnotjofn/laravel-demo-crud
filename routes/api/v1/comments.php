<?php

use Illuminate\Support\Facades\Route;

Route::middleware([

])
    ->prefix('')
    ->name('comments.')
    ->group(function () {
        Route::get('/comments', [\App\Http\Controllers\CommentController::class, 'index'])->name('index');
        Route::get('/comments/{id}', [\App\Http\Controllers\CommentController::class, 'show'])->name('show');
        Route::post('/comments', [\App\Http\Controllers\CommentController::class, 'store'])->name('store');
        Route::patch('/comments/{id}', [\App\Http\Controllers\CommentController::class, 'update'])->name('update');
        Route::delete('/comments/{id}', [\App\Http\Controllers\CommentController::class, 'destroy'])->name('destroy');
    });
