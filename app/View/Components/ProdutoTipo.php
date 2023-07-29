<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\ProdutoTipoTable;

class ProdutoTipo extends Component
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
        return view('components.produto-tipo');
    }

    public function tipos()
    {
        return ProdutoTipoTable::all();
    }
}
