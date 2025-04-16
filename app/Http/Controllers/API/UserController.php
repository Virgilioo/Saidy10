<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller; // ← IMPORTA AQUI!
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json([
            'status' => 1,
            'data' => $users
        ]);
    }

    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['status' => 0, 'message' => 'Usuário não encontrado'], 404);
        }

        return response()->json([
            'status' => 1,
            'data' => $user
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('123456'), // senha padrão
        ]);

        return response()->json(['status' => 1, 'data' => $user], 201);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['status' => 0, 'message' => 'Usuário não encontrado'], 404);
        }

        $user->update($request->only(['name', 'email']));

        return response()->json(['status' => 1, 'data' => $user]);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['status' => 0, 'message' => 'Usuário não encontrado'], 404);
        }

        $user->delete();
        return response()->json(['status' => 1, 'message' => 'Usuário deletado com sucesso']);
    }
}
