<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        // Validação robusta com mensagens personalizadas
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'cpf' => [
                'required',
                'string',
                'size:11', // 11 dígitos sem pontuação
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
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Atualizar usuário
        $user->update($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Perfil atualizado com sucesso!',
            'redirect' => route('dashboard') 
        ]);
    }
}