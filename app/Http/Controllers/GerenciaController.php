<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GerenciaController extends Controller
{
    public function gerencia()
    {
        return view('gerencia');
    }

    public function add(Request $request)
    {


        return redirect()->to('estoque/historico');
    }
}
