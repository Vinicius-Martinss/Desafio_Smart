<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckProfileComplete
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user) {
            $requiredFields = [
                'cpf', 'data_nascimento', 'genero', 'telefone',
                'cep', 'logradouro', 'numero', 'bairro', 'cidade', 'estado',
            ];

            foreach ($requiredFields as $field) {
                // Se algum campo obrigatório estiver vazio ou nulo
                if (empty($user->$field)) {
                    // Se NÃO estivermos na rota GET /profile/complete
                    // nem na rota POST /profile/complete (que tem nome 'profile.complete.update')
                    // nem na rota /logout, então redirecionamos para /profile/complete
                    if (
                        !$request->routeIs('profile.complete') 
                        && !$request->routeIs('profile.complete.update')
                        && !$request->is('logout')
                    ) {
                        return redirect()
                            ->route('profile.complete')
                            ->with('warning', 'Cadastro de usuário incompleto. Complete seu perfil para continuar.');
                    }
                    // Se já estivermos em /profile/complete (GET ou POST),
                    // deixamos passar para exibir/processar o formulário.
                    break;
                }
            }
        }

        return $next($request);
    }
}
