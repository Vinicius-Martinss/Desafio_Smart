<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Plano;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers  = User::count();
        $activePlans = Plano::where('status', 'ativo')->count();

        return view('admin.dashboard', compact('totalUsers', 'activePlans'));
    }

    public function indexUsers()
    {
        $users = User::orderBy('id')->get();
        return view('admin.users.index', compact('users'));
    }

    public function editUser (User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * 2.3 Atualiza usuário (via AJAX).
     * Retorna JSON para o JavaScript (SweetAlert).
     */

    public function updateUser (Request $request, User $user)
    {
        $data = $request->validate([
            'name'            => 'required|string|max:255',
            'email'           => 'required|email|unique:users,email,' . $user->id,
            'is_admin'        => 'required|boolean',
            'cpf'             => 'nullable|string|max:14',
            'data_nascimento' => 'nullable|date',
            'genero'          => 'nullable|string|in:M,F,O',
            'telefone'        => 'nullable|string|max:20',
            'cep'             => 'nullable|string|max:10',
            'logradouro'      => 'nullable|string|max:255',
            'numero'          => 'nullable|string|max:20',
            'complemento'     => 'nullable|string|max:100',
            'bairro'          => 'nullable|string|max:100',
            'cidade'          => 'nullable|string|max:100',
            'estado'          => 'nullable|string|max:2',
            'password'        => 'nullable|string|min:6|confirmed', 
            'photo'           => 'nullable|image|max:2048',
            'nome_empresa'  => 'nullable|string|max:255'
        ]);
    
        try {
            if ($request->hasFile('photo')) {
                // Deletar a foto antiga se existir
                if ($user->profile_photo_path) {
                    \Storage::disk('public')->delete($user->profile_photo_path);
                }
                // Armazenar a nova foto
                $data['profile_photo_path'] = $request->file('photo')->store('profile-photos', 'public');
            }
    
            if ($request->filled('password')) {
                $data['password'] = \Hash::make($request->password);
            } else {
                unset($data['password']);
            }
    
            $user->update($data);
    
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Erro ao atualizar usuário: ' . $e->getMessage(),
                ], 500);
            }
            return back()->withErrors('Erro ao atualizar usuário: ' . $e->getMessage());
        }
    
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Usuário atualizado com sucesso!',
            ]);
        }
    
        return redirect()->route('admin.usuarios.index')
                         ->with('success', 'Usuário atualizado com sucesso.');
    }
    
    /**
     * 2.4 Exclui usuário (via AJAX).
     * Retorna JSON para o JavaScript (SweetAlert).
     */
    public function destroyUser (User $user)
    {
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Usuário excluído com sucesso.',
        ]);
    }

    /**
     * 3.1 Index de Planos (Admin): busca todos os planos no banco.
     */
    public function indexPlanos()
    {
        $planos = Plano::with('user')->orderBy('id')->get();
        return view('admin.planos.index', compact('planos'));
    }

    /**
     * 3.2 Exibe formulário de edição de plano (via AJAX, já existia).
     */
    public function editPlano(Plano $plano)
    {
        return view('admin.planos.edit', compact('plano'));
    }

    /**
     * 3.3 Atualiza plano (via AJAX).
     * Retorna JSON para o JavaScript (SweetAlert).
     */
    public function updatePlano(Request $request, Plano $plano)
    {
        $data = $request->validate([
            'nome'       => 'required|string|max:255',
            'velocidade' => 'required|numeric|min:0',
            'preco'      => 'required|numeric|min:0',
            'descricao'  => 'nullable|string',
            'status'     => 'required|in:ativo,inativo',
        ]);
    
        $plano->update($data);
    
        if ($request->expectsJson()) {
            return response()->json([
                'success'  => true,
                'message'  => 'Plano atualizado com sucesso!',
                'redirect' => route('admin.planos.index'),
            ]);
        }
    
        return redirect()->route('admin.planos.index')
                         ->with('success', 'Plano atualizado com sucesso.');
    }
    
    /**
     * 3.4 Exclui plano (via AJAX).
     * Retorna JSON para o JavaScript (SweetAlert).
     */
    public function destroyPlano(Plano $plano)
    {
        $plano->delete();
        return response()->json([
            'success' => true,
            'message' => 'Plano excluído com sucesso.'
        ]);
    }
}
