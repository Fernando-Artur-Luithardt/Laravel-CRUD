<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\ProdutoTable;

class Produtos extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $selected;
    public function __construct($selected)
    {
        $this->selected = $selected;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.produtos');
    }

    public function produtos()
    {
        return ProdutoTable::select('produto.nome', 'produto.sku', ProdutoTable::raw('sum(controle_estoque.quantidade) as qtdEstoque'))->leftjoin('controle_estoque', 'controle_estoque.produtoSku', '=', 'produto.sku')->groupBy('produto.sku')->get();
    }
}
