<?php
namespace App\Policies;

use App\Models\Plano;
use App\Models\User;

class PlanoPolicy
{
    public function viewAny(User $user): bool
    {
        return true; // opcional: permite ver lista de planos
    }

    public function view(User $user, Plano $plano): bool
    {
        return $user->id === $plano->user_id;
    }

    public function create(User $user): bool
    {
        return true; // qualquer usuário pode criar plano
    }

    public function update(User $user, Plano $plano): bool
    {
        return $user->id === $plano->user_id;
    }

    public function delete(User $user, Plano $plano): bool
    {
        return $user->id === $plano->user_id;
    }

    public function restore(User $user, Plano $plano): bool
    {
        return false;
    }

    public function forceDelete(User $user, Plano $plano): bool
    {
        return false;
    }
}
