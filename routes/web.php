<?php

use App\Http\Controllers\EbookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.index');
});

Route::group(['prefix' => 'e-book', 'as' => 'e-book.'], function(){
    Route::get('/', [EbookController::class, 'index']);
});

Route::get('/', function () {
    return view('pages.index');
});
