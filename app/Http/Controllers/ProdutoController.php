<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Http\Requests\ProdutoSaveRequest;

class ProdutoController extends Controller
{
    public function produto($produto = false){
        $produtoData = Produto::select(['produto.sku', 'produto.nome', 'produto.tipo', 'produto.preco', 'produto.descricao', 'produto.descricao', 'produto.dataDeVencimento', 'produto.created_at', 'produto.updated_at', 'produto.image'])->join('produtotipo', 'produtotipo.id', '=', 'produto.tipo')->find($produto);
        return view('produto', ['produtoData' => $produtoData]);
    }

    public function addProduto(Request $request){
        
        $produto = Produto::find($request->all()['sku']);

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
            $produto = new Produto;
            $produto->sku = $request->all()['sku'];
            $this->saveProduct($produto, $request);
            return redirect()->to('estoque/produto/'.$request->all()['sku']);
        }
    }

    private function saveProduct(Produto $produto, Request $request){
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
