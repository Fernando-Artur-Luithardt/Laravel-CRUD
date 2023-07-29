<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Http\Requests\ProdutoSaveRequest;

class ProdutoController extends Controller
{
    public function produto($produto = false){
        $produtoData = Produto::select(['produto.sku', 'produto.nome', 'produto.tipo', 'produto.preco', 'produto.descricao', 'produto.descricao', 'produto.dataDeVencimento', 'produto.created_at', 'produto.updated_at'])->join('produtotipo', 'produtotipo.id', '=', 'produto.tipo')->find($produto);
        return view('produto', ['produtoData' => $produtoData]);
    }

    public function addProduto(Request $request){
        
        $produto = Produto::find($request->all()['sku']);

        $request->validate([
            'nome'      =>      'required',
            'sku'       =>      'required',
            'tipo'      =>      'required'
        ]);

        if($produto) {
            $produto->nome = $request->all()['nome'];
            $produto->dataDeVencimento = $request->all()['dataDeVencimento'];
            $produto->descricao = $request->all()['descricao'];
            $produto->tipo = $request->all()['tipo'];
            $produto->save();
            return redirect()->to('estoque/produto/'.$request->all()['sku']);
        }else{
            $produto = new Produto;
            $produto->sku = $request->all()['sku'];
            $produto->nome = $request->all()['nome'];
            $produto->dataDeVencimento = $request->all()['dataDeVencimento'];
            $produto->descricao = $request->all()['descricao'];
            $produto->tipo = $request->all()['tipo'];
            $produto->save();
            return redirect()->to('estoque/produto/'.$request->all()['sku']);
        }
    }
}
