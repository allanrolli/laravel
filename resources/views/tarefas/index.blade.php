@extends ('layout')

@section('cabecalho')
Tarefas
@endsection

@section('conteudo')
@if(!empty($mensagem))
    <div class=" alert alert-success mb-2">
        {{ $mensagem }}
    </div>
@endif
    <a href="{{ route('form_criar_tarefa') }}" class="btn btn-outline-dark mb-2">ADD</a>

    <ul class="list-group">
            @foreach ($tarefas as $tarefa)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $tarefa->nome }}
                <span class="d-flex">
                    <form method="post" action="tarefas/{{ $tarefa->id }}"
                          onsubmit="return confirm('Tem certeza que deseja remover ' +
                              '{{addslashes($tarefa->nome)}}?')">
                        @csrf
                        @method('DELETE')
                        <a href="/tarefas/{{$tarefa->id}}/temporadas"
                           class="btn btn-info btn-sm">
                            <i class="fas fa-external-link-alt"></i>
                        </a>
                        <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i>
                        </button>

                    </form>
                </span>
            </li>
        @endforeach
    </ul>
@endsection

