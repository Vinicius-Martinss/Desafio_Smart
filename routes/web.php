<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckProfileComplete;

// Rota pública
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Todas essas rotas (dashboard, provedores, etc.) só poderão ser acessadas
// se o usuário estiver autenticado e tiver completado o perfil.
// Note que usamos o nome da classe CheckProfileComplete diretamente aqui.
Route::middleware(['auth:sanctum', 'verified', CheckProfileComplete::class])->group(function () {

    // Rota para exibir o formulário de “Completar Perfil”
    // GET /profile/complete → mostra o formulário de completar perfil
    Route::get('/profile/complete', [ProfileController::class, 'show'])
        ->name('profile.complete'); 
        // ATENÇÃO: estamos chamando “profile.complete” (não “profile.show”)  
        // para não conflitar com a rota do Jetstream.

    // POST /profile/complete → processa o formulário de completar perfil
    Route::post('/profile/complete', [ProfileController::class, 'update'])
        ->name('profile.complete.update');

    // A partir daqui, tudo fica atrás do CheckProfileComplete, ou seja:
    // se faltar algum campo, o usuário será automaticamente redirecionado para /complete-profile
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rotas fixas de exemplo (provedor, serviços, etc.)
    Route::view('/cadastro_prov', 'provedor.cadastro')->name('provedor.cadastro');
    Route::view('/servicos', 'servicos')->name('servicos');
    Route::view('/about', 'about')->name('about');
    Route::view('/contact', 'contact')->name('contact');

    // Aqui também entram as rotas do Jetstream (p. ex. /user/profile),
    // porque todo esse grupo está protegido pelo CheckProfileComplete.
});
