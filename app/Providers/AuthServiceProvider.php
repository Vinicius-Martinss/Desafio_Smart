<?php

namespace App\Providers;

use App\Models\Plano;
use App\Policies\PlanoPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * O mapeamento de policies para os modelos da aplicação.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Plano::class => PlanoPolicy::class,
    ];

    /**
     * Registra quaisquer serviços de autenticação/autorização.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
