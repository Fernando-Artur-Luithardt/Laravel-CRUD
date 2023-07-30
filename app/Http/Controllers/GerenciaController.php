<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ControleEstoqueTable;
use Illuminate\Support\Facades\Auth;

class GerenciaController extends Controller
{
    public function gerencia()
    {
        return view('gerencia');
    }

    public function addGerencia(Request $request)
    {

        $request->validate([
            'quantidade'      =>      'required',
            'produtoSku'      =>      'required',
            'vendidoRecebido' =>      'required',
        ]);

        $ControleEstoque = new ControleEstoqueTable;
        $ControleEstoque->produtoSku = $request->all()['produtoSku'];
        $ControleEstoque->quantidade = $request->all()['vendidoRecebido'] == 1 ? -abs($request->all()['quantidade']) : abs($request->all()['quantidade']);
        $ControleEstoque->userId = Auth::user()->id;
        $ControleEstoque->save();

        return redirect()->to('estoque/historico');
    }
}
