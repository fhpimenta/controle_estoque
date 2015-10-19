<?php

namespace estoque\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class ProdutoController extends Controller {

    /**
     * @return string
     */
    public function lista() {

        $produtos = DB::select('select * from produtos');

        return view('produto.listagem',['produtos' => $produtos]);
    }

    public function listaJson()
    {
        $produtos = DB::select('select * from produtos');
        return response()->json($produtos);
    }

    public function mostra($id)
    {
        //$id = Request::route('id');
        $resposta = DB::select('select * from produtos where id = ?',[$id]);

        if(empty($resposta)) {
            return "<h1>Este produto não existe</h1>";
        }else {
            return view('produto.detalhes',['p' => $resposta[0]]);
        }
    }

    public function novo()
    {
        return view('produto.formulario');
    }

    public function adiciona()
    {
        $nome = Request::input('nome');
        $descricao = Request::input('descricao');
        $valor = Request::input('valor');
        $quantidade = Request::input('quantidade');

        DB::insert('insert into produtos (nome, quantidade, valor, descricao) values (?, ?, ?, ?)', [$nome, $quantidade, $valor, $descricao]);

        return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));
    }
}