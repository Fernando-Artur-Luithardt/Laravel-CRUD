<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdutoTable;

class EstoqueController extends Controller
{
    public function estoque(){
        $estoque = ProdutoTable::select(['produto.nome','produto.sku', ProdutoTable::raw('sum(controle_estoque.quantidade) as qtdEstoque')])->join('produto_tipo', 'produto_tipo.id', '=', 'produto.tipo')->leftJoin('controle_estoque', 'controle_estoque.produtoSku', '=', 'produto.sku')->groupBy('produto.sku')->get();
        return view('estoque', ['estoque' => $estoque]);
    }
}
