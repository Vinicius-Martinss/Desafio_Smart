<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Valida e atualiza as informações de perfil do usuário.
     *
     * @param  \App\Models\User  $user
     * @param  array<string,mixed>  $input
     */
    public function update(User $user, array $input): void
    {
        // 1) Regras de validação para cada campo novo
        Validator::make($input, [
            'name'            => ['required', 'string', 'max:255'],
            'email'           => [
                                  'required',
                                  'email',
                                  'max:255',
                                  Rule::unique('users')->ignore($user->id),
                                ],
            'photo'           => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'nome_empresa'    => ['nullable', 'string', 'max:255'],
            'cpf'             => ['nullable', 'string', 'regex:/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/'], 
            'data_nascimento' => ['nullable', 'date', 'before:today'],
            'genero'          => ['nullable', 'in:M,F,O'],
            'telefone'        => ['nullable', 'string', 'max:20'],
            'cep'             => ['nullable', 'string', 'max:10'],
            'logradouro'      => ['nullable', 'string', 'max:255'],
            'numero'          => ['nullable', 'string', 'max:20'],
            'complemento'     => ['nullable', 'string', 'max:255'],
            'bairro'          => ['nullable', 'string', 'max:255'],
            'cidade'          => ['nullable', 'string', 'max:255'],
            'estado'          => ['nullable', 'string', 'size:2'],
        ])->validateWithBag('updateProfileInformation');

        // 2) Se há foto nova, atualiza primeiro
        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        // 3) Se mudou o e-mail e precisa verificar, usa updateVerifiedUser()
        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            // 4) Caso normal, preenche todos os campos de uma só vez
            $user->forceFill([
                'name'            => $input['name'],
                'email'           => $input['email'],
                'nome_empresa'    => $input['nome_empresa'] ?? null,
                'cpf'             => $input['cpf'] ?? null,
                'data_nascimento' => $input['data_nascimento'] ?? null,
                'genero'          => $input['genero'] ?? null,
                'telefone'        => $input['telefone'] ?? null,
                'cep'             => $input['cep'] ?? null,
                'logradouro'      => $input['logradouro'] ?? null,
                'numero'          => $input['numero'] ?? null,
                'complemento'     => $input['complemento'] ?? null,
                'bairro'          => $input['bairro'] ?? null,
                'cidade'          => $input['cidade'] ?? null,
                'estado'          => $input['estado'] ?? null,
            ])->save();
        }
    }

    /**
     * Atualiza usuário verificado (caso mude o e-mail).
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name'              => $input['name'],
            'email'             => $input['email'],
            'email_verified_at' => null,
            // aqui você também pode adicionar os outros campos, se quiser que eles sejam salvos
            'nome_empresa'      => $input['nome_empresa'] ?? null,
            'cpf'               => $input['cpf'] ?? null,
            'data_nascimento'   => $input['data_nascimento'] ?? null,
            'genero'            => $input['genero'] ?? null,
            'telefone'          => $input['telefone'] ?? null,
            'cep'               => $input['cep'] ?? null,
            'logradouro'        => $input['logradouro'] ?? null,
            'numero'            => $input['numero'] ?? null,
            'complemento'       => $input['complemento'] ?? null,
            'bairro'            => $input['bairro'] ?? null,
            'cidade'            => $input['cidade'] ?? null,
            'estado'            => $input['estado'] ?? null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
