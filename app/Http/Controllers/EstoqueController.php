<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class EstoqueController extends Controller
{
    public function estoque(){
        $estoque = Produto::all();
        dd($estoque);
        exit;
        return view('estoque');
    }
}
