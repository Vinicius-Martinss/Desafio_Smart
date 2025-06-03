<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlanoController; // <--- NOVO
use App\Http\Middleware\CheckProfileComplete;

// Rota pública
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Grupo de rotas autenticadas e com perfil completo
Route::middleware(['auth:sanctum', 'verified', CheckProfileComplete::class])->group(function () {

    // Rotas de completar perfil
    Route::get('/profile/complete', [ProfileController::class, 'show'])
        ->name('profile.complete');

    Route::post('/profile/complete', [ProfileController::class, 'update'])
        ->name('profile.complete.update');

    // Dashboard e páginas públicas autenticadas
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::view('/servicos', 'servicos')->name('servicos');
    Route::view('/about', 'about')->name('about');
    Route::view('/contact', 'contact')->name('contact');

    // Rotas da Página do Provedor
    Route::prefix('provedor')->name('planos.')->group(function () {
        Route::get('planos', [PlanoController::class, 'index'])->name('index');
        Route::get('planos/create', [PlanoController::class, 'create'])->name('create');
        Route::post('planos', [PlanoController::class, 'store'])->name('store');
        Route::get('planos/{plano}/edit', [PlanoController::class, 'edit'])->name('edit');
        Route::put('planos/{plano}', [PlanoController::class, 'update'])->name('update');
        Route::delete('planos/{plano}', [PlanoController::class, 'destroy'])->name('destroy');
    });

    // Aqui também entram as rotas do Jetstream (/user/profile etc.)
});
