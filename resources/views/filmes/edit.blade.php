@extends('layout')

@section('cabecalho')
Editar filme {{ $filme->nome }}
@endsection

@section('conteudo')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{route('update-film')}}">
        @csrf
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="hidden" name="id" value="{{$filme->id}}">
            <input class="form-control" type="text" name="nome" value="{{$filme->nome}}" id="nome">
        </div>
        <button class="btn btn-primary">Atualizar</button>
    </form>
@endsection

</body>
</html>
