<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdutoTable;

class EstoqueController extends Controller
{
    public function estoque(){
        $estoque = ProdutoTable::select(['produto.nome','produto.sku', ProdutoTable::raw('sum(controleEstoque.quantidade) as qtdEstoque')])->join('produtotipo', 'produtotipo.id', '=', 'produto.tipo')->leftJoin('controleEstoque', 'controleEstoque.produtoSku', '=', 'produto.sku')->groupBy('produto.sku')->get();
        return view('estoque', ['estoque' => $estoque]);
    }
}
