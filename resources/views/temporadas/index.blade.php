@extends ('layout')

@section('cabecalho')
    Tarefas da Temporada {{$tarefa->nome}}
@endsection

@section('conteudo')
    <ul class="list-group">
        @foreach ($temporadas as $temporada)
            <li class="list-group-item">Tarefa de Temporada {{$temporada->numero}}</li>
        @endforeach
    </ul>
    <a href="/tarefas" class="btn btn-outline-danger mt-2">
        <i class="far fa-hand-point-left"></i>
    </a>
@endsection
