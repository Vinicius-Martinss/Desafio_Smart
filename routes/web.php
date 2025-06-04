<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanoController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckProfileComplete;

// Rota pública
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Rotas autenticadas e com perfil completo
Route::middleware(['auth:sanctum', 'verified', CheckProfileComplete::class])->group(function () {

    // Completar perfil (já existente)
    Route::get('/profile/complete', [ProfileController::class, 'show'])
        ->name('profile.complete');
    Route::post('/profile/complete', [ProfileController::class, 'update'])
        ->name('profile.complete.update');

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Outras rotas estáticas...
    Route::view('/servicos', 'servicos')->name('servicos');
    Route::view('/about', 'about')->name('about');
    Route::view('/contact', 'contact')->name('contact');

    // Rotas de Plano (sem “provedor” no prefixo)
    Route::get('planos', [PlanoController::class, 'index'])->name('planos.index');
    Route::get('planos/create', [PlanoController::class, 'create'])->name('planos.create');
    Route::post('planos', [PlanoController::class, 'store'])->name('planos.store');
    Route::get('planos/{plano}/edit', [PlanoController::class, 'edit'])->name('planos.edit');
    Route::put('planos/{plano}', [PlanoController::class, 'update'])->name('planos.update');
    Route::delete('planos/{plano}', [PlanoController::class, 'destroy'])->name('planos.destroy');
});
