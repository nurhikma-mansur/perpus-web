<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\Student\EbookController as StudentEbookController;
use Illuminate\Support\Facades\Route;

Route::view('/login', 'pages.login')->name('login');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function(){

    Route::get('/', function () {
        return view('pages.index');
    });
    
    Route::group(['prefix' => 'book', 'as' => 'book.'], function(){


        Route::view('/', 'pages.book.index')->name('index');
        Route::view('/detail/{book}', 'pages.book.form')->name('detail');
        Route::view('/create', 'pages.book.form')->name('create');

        Route::group(['prefix' => 'loan', 'as' => 'loan.'], function(){
            Route::view('/', 'pages.book-loan.index')->name('index');
            Route::view('/detail/{loan}', 'pages.book-loan.form')->name('detail');
            Route::view('/create', 'pages.book-loan.form')->name('create');
        });
    });
    
    
    Route::group(['prefix' => 'archive', 'as' => 'archive.'], function(){
        Route::get('/', [ArchiveController::class, 'index'])->name('index');
        Route::view('/detail/{archive}', 'pages.archive.form')->name('detail');
        Route::get('/create', [ArchiveController::class, 'create'])->name('create');
    });

    Route::group(['prefix' => 'master-data', 'as' => 'master-data.'], function(){
        
        Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
            Route::get('/', [AdminController::class, 'index'])->name('index');
            Route::get('/create', [AdminController::class, 'create'])->name('create');
            Route::view('/detail/{user}', 'pages.admin.form')->name('detail');
        });

    });

    Route::group(['prefix' => 'report', 'as' => 'report.'], function(){
        Route::view('/', 'pages.report.index');
    });
    
    
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', function(){
        return view('pages.students.index');
    });
    
    Route::group(['prefix' => 'e-book', 'as' => 'e-book.'], function(){
        Route::get('/', [StudentEbookController::class, 'index']);
    });
    
    Route::group(['prefix' => 'archive', 'as' => 'archive.'], function(){
        Route::view('/', 'pages.students.archive.index');
    });
});


Route::view('/registration', 'pages.registration.index')->name('registration');
Route::view('/registration-success', 'pages.registration.success')->name('registration-success');

