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
                'cep', 'logradouro', 'numero', 'bairro', 'cidade', 'estado'
            ];
            
            foreach ($requiredFields as $field) {
                if (empty($user->$field)) {
                    if (!$request->is('user/profile*') && !$request->is('logout')) {
                        return redirect()->route('profile.show')
                            ->with('warning', 'Cadastro de usuário incompleto. Por favor, atualize as informações do usuário para ter acesso à todos os recursos da nossa plataforma.');
                    }
                    break;
                }
            }
        }

        return $next($request);
    }
}