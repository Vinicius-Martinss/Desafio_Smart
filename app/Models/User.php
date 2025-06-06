<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    
    use HasApiTokens;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf',
        'cpf_validado',
        'cpf_ultima_verificacao',
        'data_nascimento',
        'genero',
        'telefone',
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'is_admin',
        'profile_photo_path',
        'nome_empresa', 
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'cpf_validado' => 'boolean',
        ];
    }

    public function isProfileComplete(): bool
    {
        $requiredFields = [
            'cpf', 'data_nascimento', 'genero', 'telefone',
            'cep', 'logradouro', 'numero', 'bairro', 'cidade', 'estado'
        ];
        
        foreach ($requiredFields as $field) {
            // Verifica se o campo está vazio ou nulo
            if (empty($this->$field) || $this->$field === null) {
                return false;
            }
        }
        
        return true;
    }


    public function planos()
    {
        return $this->hasMany(Plano::class);
    }

     // Casts de campos
     protected $casts = [
        'email_verified_at' => 'datetime',
        'data_nascimento'   => 'date',
        'is_admin'          => 'boolean'
    ];

    
    
}
