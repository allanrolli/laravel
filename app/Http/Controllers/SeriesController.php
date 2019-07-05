<?php

namespace App\Http\Controllers;

use App\Tarefa;
use Illuminate\Http\Request;
use App\Http\Requests\AutorizacaoForm;

class SeriesController extends Controller
{
    public function index(Request $request) {

        $tarefas = Tarefa::query()
            ->orderBy('nome')
            ->get();

        $mensagem = $request->session()->get('mensagem');




        return view('tarefas.index', compact('tarefas', 'mensagem'));
    }

    public function create()
    {
        return view('tarefas.create');
    }

    public function store(AutorizacaoForm $request)
    {

        $tarefa= Tarefa::create(['nome' => $request->nome]);
        $qtdTemporadas = $request->qtd_temporadas;
        for($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $tarefa->temporadas()->create(['numero' => $i]);

            for ($j = 1; $j <= $request->ep_por_temporada;$j++ ){
                $temporada->episodios()->create(['numero'=> $j]);
            }
        }
        $request->session()
            ->flash(
                'mensagem',
                "The task {$tarefa->id} {$tarefa->nome} created with success"
            );

        return redirect()->route('listar_tarefas');
    }

    public function destroy(Request $request)
    {
        Tarefa::destroy($request->id);
        $request->session()
            ->flash(
                'mensagem',
                "The task removed with success"
            );
         return redirect()->route('listar_tarefas');
    }
}
