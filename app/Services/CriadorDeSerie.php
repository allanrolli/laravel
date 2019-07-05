<?php


namespace App\Services;


use App\Tarefa;

class CriadorDeSerie
{
    public function criarSerie(
        string $nomeSerie,
        int $qtdTemporadas,
        int $epPorTemporada

    ):  Tarefa{
        $tarefa= Tarefa::create(['nome' => $nomeSerie]);
        for($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $tarefa->temporadas()->create(['numero' => $i]);

            for ($j = 1; $j <= $epPorTemporada;$j++ ){
                $temporada->episodios()->create(['numero'=> $j]);
            }
        }
        return $tarefa;
    }
}
