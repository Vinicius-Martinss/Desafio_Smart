<?php

namespace App\Http\Controllers;

use App\Models\Plano;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProviderController extends Controller
{
    /**
     * Exibe a Dashboard do provedor (usuário logado).
     */
    public function dashboard()
    {
        $user = Auth::user();
        $teamId = $user->current_team_id;

        // 1) Últimos 5 planos deste provedor
        $ultimosPlanos = Plano::where('team_id', $teamId)
                              ->latest()
                              ->take(5)
                              ->get();

        // 2) Estatísticas básicas
        $totalPlanos = Plano::where('team_id', $teamId)->count();
        $ativos      = Plano::where('team_id', $teamId)
                             ->where('status', 'ativo')
                             ->count();
        $inativos    = Plano::where('team_id', $teamId)
                             ->where('status', 'inativo')
                             ->count();

        return view('dashboard', compact('user', 'ultimosPlanos', 'totalPlanos', 'ativos', 'inativos'));
        // Note que estamos retornando a view 'dashboard' (o arquivo Blade resources/views/dashboard.blade.php)
    }
}
