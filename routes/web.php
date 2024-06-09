<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\EbookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.index');
});

Route::group(['prefix' => 'e-book', 'as' => 'e-book.'], function(){
    Route::get('/', [EbookController::class, 'index'])->name('index');
    Route::get('/create', [EbookController::class, 'create'])->name('create');
});

Route::group(['prefix' => 'archive', 'as' => 'archive.'], function(){
    Route::get('/', [ArchiveController::class, 'index'])->name('index');
    Route::get('/create', [ArchiveController::class, 'create'])->name('create');
});

Route::get('/', function () {
    return view('pages.index');
});
