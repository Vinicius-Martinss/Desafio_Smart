<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Rota pública
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Grupo de rotas autenticadas
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // Perfil (sem verificação de perfil completo)
    Route::get('/user/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/user/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    // Rotas protegidas por perfil completo
    Route::middleware('profile.complete')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
        
        // Rotas do provedor
        Route::view('/cadastro_prov', 'provedor.cadastro')->name('provedor.cadastro');
        Route::view('/servicos', 'servicos')->name('servicos');
        Route::view('/about', 'about')->name('about');
        Route::view('/contact', 'contact')->name('contact');
        
        // Rotas do Jetstream (elas serão automaticamente tratadas pelo Jetstream)
    });
});
