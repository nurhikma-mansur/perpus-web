<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\Student\EbookController as StudentEbookController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){

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

    Route::group(['prefix' => 'master-data', 'as' => 'master-data.'], function(){
        
        Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
            Route::get('/', [AdminController::class, 'index'])->name('index');
            Route::get('/create', [AdminController::class, 'create'])->name('create');
        });

    });
    
    
});

Route::get('/', function(){
    return view('pages.students.index');
});

Route::group(['prefix' => 'e-book', 'as' => 'e-book.'], function(){
    Route::get('/', [StudentEbookController::class, 'index']);
});


