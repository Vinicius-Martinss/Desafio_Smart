<?php

namespace App\Http\Controllers;

use App\Models\Plano;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PlanoController extends Controller
{
    use AuthorizesRequests;

    /**
     * Exibe a lista de planos do usuário.
     */
    public function index()
    {
        $planos = Auth::user()->planos()->latest()->get();
        return view('planos.index', compact('planos'));
    }

    /**
     * Exibe o formulário de criação de um novo plano.
     */
    public function create()
    {
        return view('planos.create');
    }

    /**
     * Armazena um novo plano no banco.
     * Se for AJAX, retorna JSON; caso contrário, redirect normal.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome'       => 'required|string|max:255',
            'velocidade' => 'required|numeric|min:0',
            'preco'      => 'required|numeric|min:0',
            'descricao'  => 'nullable|string',
        ]);

        $plano = Auth::user()->planos()->create($data);

        if ($request->expectsJson()) {
            return response()->json([
                'success'  => true,
                'message'  => 'Plano criado com sucesso!',
                'redirect' => route('planos.index'),
            ]);
        }

        return redirect()->route('planos.index')
                         ->with('success', 'Plano criado com sucesso!');
    }

    /**
     * Exibe o formulário de edição para um plano específico.
     * O método implicitly bind $plano a partir da rota.
     */
    public function edit(Plano $plano)
    {
        $this->authorize('update', $plano);
        return view('planos.edit', compact('plano'));
    }
    
    /**
     * Atualiza um plano existente.
     * Se for AJAX, retorna JSON; caso contrário, redirect normal.
     */
    public function update(Request $request, Plano $plano)
    {
        $this->authorize('update', $plano);

        $data = $request->validate([
            'nome'       => 'required|string|max:255',
            'velocidade' => 'required|numeric|min:0',
            'preco'      => 'required|numeric|min:0',
            'descricao'  => 'nullable|string',
        ]);

        $plano->update($data);

        if ($request->expectsJson()) {
            return response()->json([
                'success'  => true,
                'message'  => 'Plano atualizado com sucesso!',
                'redirect' => route('planos.index'),
            ]);
        }

        return redirect()->route('planos.index')
                         ->with('success', 'Plano atualizado!');
    }

    /**
     * Remove um plano.
     * Se for AJAX, retorna JSON; caso contrário, redirect normal.
     */
    public function destroy(Plano $plano)
    {
        $this->authorize('delete', $plano);
        $plano->delete();

        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Plano removido com sucesso.',
            ]);
        }

        return back()->with('success', 'Plano removido.');
    }
}
