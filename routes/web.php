<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController ;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PageController;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::name('frontend.')->group(function () {

    Route::get('/', [HomeController::class,'index'])->name('index');

    Route::get('/about',[PageController::class,'about'])->name('about');
    Route::get('/services',[PageController::class,'services'])->name('services');
    Route::get('/doctors',[PageController::class,'doctors'])->name('doctors');
    Route::get('/appointment',[PageController::class,'appointment'])->name('appointment');
    Route::get('/contact',[PageController::class,'contact'])->name('contact');

});


/*
|--------------------------------------------------------------------------
| USER DASHBOARD
|--------------------------------------------------------------------------
*//*  */


Route::middleware(['auth','permission:view dashboard'])
    ->prefix('dashboard')
    ->name('dashboard.')
    ->group(function(){

        Route::get('/',[DashboardController::class,'index'])->name('index');

});


/*
|--------------------------------------------------------------------------
| ADMIN DASHBOARD
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function(){

        Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

});
