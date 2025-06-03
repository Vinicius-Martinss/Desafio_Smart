<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Exibe o formulário para “Completar Perfil” (GET /profile/complete).
     */
    public function show()
    {
        $user = Auth::user();

        // Se o usuário já tiver todos os campos preenchidos, redireciona para /dashboard
        if ($user->isProfileComplete()) {
            return redirect()->route('dashboard');
        }

        return view('profile.complete', compact('user'));
    }

    /**
     * Processa o POST do formulário de completar perfil (POST /profile/complete).
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // 1) Validação dos campos
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'cpf' => [
                'required',
                'string',
                'size:11',
                Rule::unique('users')->ignore($user->id),
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^\d{11}$/', $value)) {
                        $fail('O CPF deve conter 11 dígitos numéricos.');
                    }
                }
            ],
            'data_nascimento' => 'required|date_format:Y-m-d',
            'genero' => 'required|in:M,F,O',
            'telefone' => [
                'required',
                'string',
                'min:10',
                'max:11',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^\d{10,11}$/', $value)) {
                        $fail('O telefone deve conter 10 ou 11 dígitos numéricos.');
                    }
                }
            ],
            'cep' => [
                'required',
                'string',
                'size:8',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^\d{8}$/', $value)) {
                        $fail('O CEP deve conter 8 dígitos numéricos.');
                    }
                }
            ],
            'logradouro' => 'required|string|max:255',
            'numero' => 'required|string|max:10',
            'complemento' => 'nullable|string|max:255',
            'bairro' => 'required|string|max:100',
            'cidade' => 'required|string|max:100',
            'estado' => 'required|string|size:2',
        ], [
            'cpf.size' => 'O CPF deve conter exatamente 11 dígitos.',
            'telefone.min' => 'O telefone deve ter no mínimo 10 dígitos.',
            'telefone.max' => 'O telefone deve ter no máximo 11 dígitos.',
            'cep.size' => 'O CEP deve conter exatamente 8 dígitos.',
            'estado.size' => 'O estado deve ser a sigla com 2 caracteres.',
        ]);

        if ($validator->fails()) {
            // Se falhar, retorna JSON de erro (caso você esteja submetendo via AJAX)
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // 2) Atualiza o usuário no banco
        $user->update([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'data_nascimento' => $request->data_nascimento,
            'genero' => $request->genero,
            'telefone' => $request->telefone,
            'cep' => $request->cep,
            'logradouro' => $request->logradouro,
            'numero' => $request->numero,
            'complemento' => $request->complemento,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'cpf_validado' => true,
            'cpf_ultima_verificacao' => now(),
        ]);

        // 3) Após salvar, redireciona para /dashboard
        //    (o middleware CheckProfileComplete vai deixar passar porque agora está completo)
        return response()->json([
            'success'  => true,
            'message'  => 'Perfil atualizado com sucesso!',
            'redirect' => route('dashboard'),
        ]);
        
    }
}
