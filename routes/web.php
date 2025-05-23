<?php

use GuzzleHttp\Psr7\FnStream;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
}) ->name('home');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified',])
->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

});
