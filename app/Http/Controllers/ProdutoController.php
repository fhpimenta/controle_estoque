<?php

namespace estoque\Http\Controllers;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller {

    /**
     * @return string
     */
    public function lista() {

        $produtos = DB::select('select * from produtos');


        return view('listagem',['produtos' => $produtos]);

    }

    public function mostra()
    {
        $id = 1;
        $resposta = DB::select('select * from produtos where id = ?',[$id]);

        if(empty($resposta)) {
            return "<h1>Este produto não existe</h1>";
        }else {
            return view('detalhes',['p' => $resposta[0]]);
        }
    }
}