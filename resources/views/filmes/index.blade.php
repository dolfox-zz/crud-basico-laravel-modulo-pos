@extends('layout')

@section('cabecalho')
Filmes
@endsection

@section('conteudo')

@if(!empty($mensagem))
<div class="alert alert-success">
    {{ $mensagem }}
</div>
@endif

<a href="/filmes/criar/" class="btn btn-dark mb-2">Adicionar</a>

<ul class="list-group">
    @foreach($filmes as $filme)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $filme->nome }}
            <form method="post" action="/filmes/{{ $filme->id }}"
                onsubmit="return confirm('tem certeza que deseja remover {{ addslashes($filme->nome) }}?')">
                @csrf
                @method('DELETE')
                <div>
                    <a href="/filmes/{{$filme->id}}/edit" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>

                    <button class="btn btn-danger btn-sm">
                        <i class="far fa-trash-alt "></i>
                    </button>
                </div>
            </form>
        </li>
    @endforeach
</ul>
@endsection
