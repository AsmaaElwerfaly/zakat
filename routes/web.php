<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonationsController;



Route::get('/', function () {
    return view('auth.login');

    
});
Auth::routes();


Route::resource( 'categories' ,CategoriesController::class);

Route::resource( 'campaign' ,CampaignController::class);

Route::resource( 'donation' ,DonationsController::class);

Route::get('donations/{id}',[ CampaignController::class ,'index2']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/{page}', 'App\Http\Controllers\AdminController@index');
