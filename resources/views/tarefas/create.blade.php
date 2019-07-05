@extends('layout')

@section('cabecalho')
Add Task
@endsection

@section('conteudo')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <form  method="post">
            @csrf
            <div class="row">
                <div class="col col-8">
                    <label for="nome" class="">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome">
                </div>

                <div class="col col-2">
                    <label for="qtd_temporadas" class="">N° temporadas</label>
                    <input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporadas">
                </div>

                <div class="col col-2">
                    <label for="ep_por_temporada" class="">Ep. por temporada</label>
                    <input type="number" class="form-control" name="ep_por_temporada" id="ep_por_temporada">
                </div>

            </div>

            <button class="btn btn-outline-dark mt-2">
                <i class="fas fa-cat"></i>
            </button>

            <a href="/tarefas" class="btn btn-outline-danger mt-2">
                <i class="far fa-hand-point-left"></i>
            </a>

        </form>
@endsection
