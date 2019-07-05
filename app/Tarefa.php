<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    //pode ser omitido por ser do mesmo nome que a classe
    //protected $table = 'tarefas';
    public $timestamps = false;
    protected $fillable = ['nome'];

    public function temporadas()
    {
        return $this->hasMany(Temporada::class);
    }
}
