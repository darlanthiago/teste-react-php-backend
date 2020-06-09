<?php

namespace App\Http\Controllers;

use App\Atividade;
use Illuminate\Http\Request;

class AtividadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Atividade::with(['projeto'])->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required|string',
            'projeto_id' => 'required|integer'
        ]);

        $atividade = new Atividade();

        $atividade->descricao = $request->descricao;
        $atividade->projeto_id = $request->projeto_id;

        $atividade->save();

        return $atividade;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $atividade = Atividade::find($id);

        if (empty($atividade)) {
            return response()->json(['error' => "Atividade não encontrada"], 404);
        }

        return Atividade::with(['projeto'])->where('id', '=', $id)->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $atividade = Atividade::find($id);

        if (empty($atividade)) {
            return response()->json(['error' => "Atividade não encontrada"], 404);
        }

        $atividade->descricao = $request->descricao;
        $atividade->projeto_id = $request->projeto_id;

        $atividade->save();

        return Atividade::with(['projeto'])->where('id', '=', $id)->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $atividade = Atividade::find($id);

        if (empty($atividade)) {
            return response()->json(['error' => "Atividade não encontrada"], 404);
        }

        $atividade->delete();

        return response()->json(['message' => 'Atividade removida com sucesso!'], 200);
    }
}
