<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Middleware\CheckProfileComplete;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ContratoController;


// Rota pública (Welcome)
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/sobre', function () {
     return view('sobre');
 })->name('sobre');
// Rotas autenticadas + CheckProfileComplete
Route::middleware(['auth:sanctum', 'verified', CheckProfileComplete::class])->group(function () {

    // Completar perfil
    Route::get('/profile/complete', [ProfileController::class, 'show'])
         ->name('profile.complete');
    Route::post('/profile/complete', [ProfileController::class, 'update'])
         ->name('profile.complete.update');

    // Dashboard do usuário comum
    Route::get('/dashboard', [ProviderController::class, 'dashboard'])
         ->name('dashboard');
          //Rotas para gerar contrato
         Route::get('/contrato/gerar', [ContratoController::class, 'form'])
         ->name('contrato.form');
          Route::post('/contrato/gerar', [ContratoController::class, 'gerar'])
         ->name('contrato.gerar');



    // Rotas de Plano (area do provedor, AJAX já em PlanoController)
    Route::get('planos', [PlanoController::class, 'index'])->name('planos.index');
    Route::get('planos/create', [PlanoController::class, 'create'])->name('planos.create');
    Route::post('planos', [PlanoController::class, 'store'])->name('planos.store');
    Route::get('planos/{plano}/edit', [PlanoController::class, 'edit'])->name('planos.edit');
    Route::put('planos/{plano}', [PlanoController::class, 'update'])->name('planos.update');
    Route::delete('planos/{plano}', [PlanoController::class, 'destroy'])->name('planos.destroy');


    // --------------------------------------------------------
    // Grupo de rotas administrativas (somente administradores)
    // --------------------------------------------------------
    Route::prefix('admin')
         ->name('admin.')
         ->middleware(IsAdmin::class)   // Aplica o middleware diretamente
         ->group(function () {

        // 1. Dashboard do Admin
        Route::get('/', [AdminController::class, 'dashboard'])
             ->name('dashboard');

        // 2. Lista de Usuários
        Route::get('usuarios', [AdminController::class, 'indexUsers'])
             ->name('usuarios.index');
        // 2.1. Editar Usuário (já existia)
        Route::get('usuarios/{user}/edit', [AdminController::class, 'editUser'])
             ->name('usuarios.edit');
        // 2.2. Atualizar Usuário (via form Blade tradicional)
        Route::put('usuarios/{user}', [AdminController::class, 'updateUser'])
             ->name('usuarios.update');
        // 2.3. Excluir Usuário (via form Blade)
        Route::delete('usuarios/{user}', [AdminController::class, 'destroyUser'])
             ->name('usuarios.destroy');

        // 3. Lista de Planos (Admin)
        Route::get('planos', [AdminController::class, 'indexPlanos'])
             ->name('planos.index');
        // 3.1. Editar Plano (via AJAX)
        Route::get('planos/{plano}/edit', [AdminController::class, 'editPlano'])
             ->name('planos.edit');
        // 3.2. Atualizar Plano (via AJAX)
        Route::put('planos/{plano}', [AdminController::class, 'updatePlano'])
             ->name('planos.update');
        // 3.3. Excluir Plano (via AJAX)
        Route::delete('planos/{plano}', [AdminController::class, 'destroyPlano'])
             ->name('planos.destroy');
    });
});
