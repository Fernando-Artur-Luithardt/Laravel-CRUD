<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function produto($produto){
        $produtoData = Produto::select(['produto.sku', 'produto.nome', 'produto.tipo', 'produto.preco', 'produto.descricao', 'produto.descricao', 'produto.dataDeVencimento', 'produto.dataDeCadastro', 'produto.dataDeEdicao'])->where('produto.sku', [$produto])->join('produtotipo', 'produtotipo.id', '=', 'produto.tipo')->get();
        return view('produto', ['produtoData' => $produtoData[0]]);
    }
}
