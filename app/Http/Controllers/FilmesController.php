<?php


namespace App\Http\Controllers;


use App\Filme;
use App\Http\Requests\FilmesFormRequest;
use Illuminate\Http\Request;

class FilmesController extends Controller
{
    public function index(Request $request)
    {
        $filmes = Filme::query()
            ->orderBy('nome')
            ->get();

        $mensagem = $request->session()->get('mensagem');

        return view('filmes.index', compact('filmes', 'mensagem'));
    }

    public function create()
    {
        return view('filmes.create');
    }

    public function store(FilmesFormRequest $request)
    {
        $nome = $request->nome;
//        $filme = new Filme();
//        $filme->nome = $nome;
//        var_dump($filme->save());

        $filme = Filme::create($request->all());

        $request->session()
            ->flash('mensagem', "Filme $filme->nome criado com sucesso!");

        return redirect()->route('listar_filmes');
    }

    public function show(Filme $filme)
    {
        return view('filmes.show', compact('filme'));
    }

    public function edit($id)
    {
        $filme = Filme::findOrFail($id);
        return view('filmes.edit', compact('filme'));
    }

    public function update(FilmesFormRequest $request)
    {
        $filme = Filme::findOrFail($request->id);
        $filme->update($request->all());
        return redirect()->route('listar_filmes')->with('success', 'Filme atualizado com sucesso');
    }

    public function destroy(Request $request)
    {
        Filme::destroy($request->id);
        $mensagem = $request->session()
            ->flash('mensagem', "Filme excluído com sucesso!");

        return redirect()->route('listar_filmes');
    }
}
