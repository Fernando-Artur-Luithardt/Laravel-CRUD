<?php

namespace App\Http\Controllers;
use App\Models\ControleEstoqueTable;
use Illuminate\Http\Request;

class HistoricoController extends Controller
{
    public function historico(){
        $historicos = ControleEstoqueTable::join('produto', 'produto.sku', '=', 'controle_estoque.produtoSku')->join('users', 'users.id', '=', 'controle_estoque.userId')->orderBy('controle_estoque.created_at', 'desc')->get();
        return view('historico', ['historicos' => $historicos]);
    }
}
