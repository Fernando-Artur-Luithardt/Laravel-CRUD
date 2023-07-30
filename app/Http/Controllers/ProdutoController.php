<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProdutoTable;
use App\Models\ControleEstoqueTable;
use App\Http\Requests\ProdutoSaveRequest;

class ProdutoController extends Controller
{
    public function produto($produto = false){
        $produtoData = ProdutoTable::select(['produto.sku', 'produto.nome', 'produto.tipo', 'produto.preco', 'produto.descricao', 'produto.descricao', 'produto.dataDeVencimento', 'produto.created_at', 'produto.updated_at', 'produto.image'])->join('produto_tipo', 'produto_tipo.id', '=', 'produto.tipo')->find($produto);
        $qtdEstoque = ControleEstoqueTable::select(ControleEstoqueTable::raw('sum(quantidade) as qtdEstoque'))->where('controle_estoque.produtoSku', $produto)->get();
        return view('produto', ['produtoData' => $produtoData, 'qtdEstoque' => $qtdEstoque[0]]);
    }

    public function addProduto(Request $request){

        $produto = ProdutoTable::find($request->all()['sku']);

        $request->validate([
            'nome'      =>      'required',
            'sku'       =>      'required',
            'tipo'      =>      'required',
            'image'     => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        if($produto) {
            $this->saveProduct($produto, $request);
            return redirect()->to('estoque/produto/'.$request->all()['sku']);
        }else{
            $produto = new ProdutoTable;
            $produto->sku = $request->all()['sku'];
            $produto->userId = Auth::user()->id;
            $this->saveProduct($produto, $request);
            return redirect()->to('estoque/produto/'.$request->all()['sku']);
        }
    }

    private function saveProduct(ProdutoTable $produto, Request $request){
        $produto->nome = $request->all()['nome'];
        $produto->dataDeVencimento = $request->all()['dataDeVencimento'];
        $produto->descricao = $request->all()['descricao'];
        $produto->tipo = $request->all()['tipo'];
        if($request->image){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $produto->image = $imageName;
        }
        $produto->save();
    }
}
