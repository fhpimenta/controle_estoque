<?php

namespace estoque\Http\Controllers;
use estoque\Http\Requests\ProdutosRequest;
use estoque\Produto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class ProdutoController extends Controller {

    /**
     * @return string
     */
    public function lista() {

        $produtos = Produto::all();

        return view('produto.listagem',['produtos' => $produtos]);
    }

    public function listaJson()
    {
        $produtos = Produto::all();
        return response()->json($produtos);
    }

    public function mostra($id)
    {
        //$id = Request::route('id');
        $produto = Produto::find($id);

        if(empty($produto)) {
            return "<h1>Este produto não existe</h1>";
        }else {
            return view('produto.detalhes',['p' => $produto]);
        }
    }

    public function novo()
    {
        return view('produto.formulario');
    }

    public function adiciona(ProdutosRequest $request)
    {
        Produto::create($request->all());

        return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));
    }

    public function atualizar($id, ProdutosRequest $request)
    {
        $produto = Produto::find($id);

        $produto->nome = $request->input('nome');
        $produto->descricao = $request->input('descricao');
        $produto->valor = $request->input('valor');
        $produto->quantidade = $request->input('quantidade');

        $produto->save();

        return redirect()->action('ProdutoController@lista');
    }

    public function editar($id)
    {
        $produto = Produto::find($id);

        return view('produto.editar', ['p' => $produto]);
    }

    public function remove($id)
    {
        $produto = Produto::find($id);
        $produto->delete();

        return redirect()->action('ProdutoController@lista');
    }
}