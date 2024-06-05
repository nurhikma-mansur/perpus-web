<?php

use App\Http\Controllers\EbookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.index');
});

Route::group(['prefix' => 'e-book', 'as' => 'e-book.'], function(){
    Route::get('/', [EbookController::class, 'index'])->name('index');
    Route::get('/create', [EbookController::class, 'create'])->name('create');
});

Route::get('/', function () {
    return view('pages.index');
});
