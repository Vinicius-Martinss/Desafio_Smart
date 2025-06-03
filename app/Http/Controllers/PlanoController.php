<?php

namespace App\Http\Controllers;

use App\Models\Plano;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PlanoController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $planos = Auth::user()->planos()->latest()->get();
        return view('planos.index', compact('planos'));
    }

    public function create()
    {
        return view('planos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'velocidade' => 'required|numeric|min:0',
            'preco' => 'required|numeric|min:0',
            'descricao' => 'nullable|string',
        ]);

        $plano = Auth::user()->planos()->create($data);

        // Retorno para AJAX (fetch)
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Plano criado com sucesso!',
                'redirect' => route('planos.index')
            ]);
        }

        // Redirecionamento normal
        return redirect()->route('planos.index')->with('success', 'Plano criado com sucesso!');
    }

    public function edit(Plano $plano)
    {
        $this->authorize('update', $plano);
        return view('planos.edit', compact('plano'));
    }

    public function update(Request $request, Plano $plano)
    {
        $this->authorize('update', $plano);

        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'velocidade' => 'required|numeric|min:0',
            'preco' => 'required|numeric|min:0',
            'descricao' => 'nullable|string',
        ]);

        $plano->update($data);

        // Retorno para AJAX (opcional, se quiser aplicar no update futuramente)
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Plano atualizado!',
                'redirect' => route('planos.index')
            ]);
        }

        return redirect()->route('planos.index')->with('success', 'Plano atualizado!');
    }

    public function destroy(Plano $plano)
    {
        $this->authorize('delete', $plano);
        $plano->delete();

        // Retorno para AJAX (opcional, se usar AJAX na exclusão)
        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Plano removido.'
            ]);
        }

        return back()->with('success', 'Plano removido.');
    }
}
