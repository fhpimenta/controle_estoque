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
}