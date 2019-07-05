<?php

namespace App\Http\Controllers;

use App\Episodio;
use App\Services\CriadorDeSerie;
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

    public function store(
        AutorizacaoForm $request,
        CriadorDeSerie $criadorDeSerie)
    {

        $tarefa = $criadorDeSerie->criarSerie(
            $request->nome,
            $request->qtd_temporadas,
            $request->ep_por_temporada
        );

        $request->session()
            ->flash(
                'mensagem',
                "The task {$tarefa->id} {$tarefa->nome} created with success"
            );

        return redirect()->route('listar_tarefas');
    }

    public function destroy(Request $request)
    {
        $tarefa = Tarefa::find($request->id);
        $nomeTarefa = $tarefa->nome;
        $tarefa->temporadas->each(function (Temporada $temporada){

            $temporada->episodios->each(function (Episodio $episodio){
                $episodio->delete();
            });

            $temporada->delete();
        });
        $tarefa->delete();
        $request->session()
            ->flash(
                'mensagem',
                "The task $nomeTarefa removed with success"
            );
         return redirect()->route('listar_tarefas');
    }
}
