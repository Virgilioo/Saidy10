<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Estudante;
use Illuminate\Http\Request;

class EstudanteController extends Controller
{
    // Listar todos os estudantes
    public function index()
    {
        $estudantes = Estudante::all();
        return response()->json($estudantes);
    }

    // Criar um novo estudante
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:estudantes,email',
            'telemovel' => 'required|string',
            'endereco' => 'required|string',
            'curso' => 'required|string',
            'periodo' => 'required|string',
        ]);

        $estudante = Estudante::create($request->all());
        return response()->json($estudante, 201);
    }

    // Exibir um estudante específico
    public function show($id)
    {
        $estudante = Estudante::find($id);

        if (!$estudante) {
            return response()->json(['message' => 'Estudante não encontrado'], 404);
        }

        return response()->json($estudante);
    }

    // Atualizar um estudante existente
    public function update(Request $request, $id)
    {
        $estudante = Estudante::find($id);

        if (!$estudante) {
            return response()->json(['message' => 'Estudante não encontrado'], 404);
        }

        $estudante->update($request->all());
        return response()->json($estudante);
    }

    // Excluir um estudante
    public function destroy($id)
    {
        $estudante = Estudante::find($id);

        if (!$estudante) {
            return response()->json(['message' => 'Estudante não encontrado'], 404);
        }

        $estudante->delete();
        return response()->json(['message' => 'Estudante excluído com sucesso']);
    }
}