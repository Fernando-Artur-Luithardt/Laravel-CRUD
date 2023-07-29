<?php

namespace App\Http\Controllers;
use App\Models\ControleEstoqueTable;
use Illuminate\Http\Request;

class HistoricoController extends Controller
{
    public function historico(){
        $historicos = ControleEstoqueTable::join('produto', 'produto.sku', '=', 'controleestoque.produtoSku')->get();
        return view('historico', ['historicos' => $historicos]);
    }
}
