<?php

use GuzzleHttp\Psr7\FnStream;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified',])
->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::view('/servicos', 'servicos')->name('servicos');
    Route::view('/about', 'about')->name('about');
    Route::view('/contact', 'contact')->name('contact');



});
