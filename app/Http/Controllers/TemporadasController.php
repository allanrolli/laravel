<?php

namespace App\Http\Controllers;

use App\Tarefa;
use Illuminate\Http\Request;

class TemporadasController extends Controller
{
    public function index(int $tarefaId)
    {
        $tarefa = Tarefa::find($tarefaId);
        $temporadas = $tarefa->temporadas;

        return view(
            'temporadas.index',
            compact('tarefa','temporadas'));
    }
}
