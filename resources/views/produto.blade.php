<x-app-layout>
    <form method="POST" action="{{ route('produto.addProduto') }}">
        @csrf
        <div class="container">
            <div>
                <label>SKU</label>
                <input type="text" value="{{$produtoData->sku ?? ''}}" name="sku">
                <label>Nome</label>
                <input type="text" value="{{$produtoData->nome ?? ''}}" name="nome"   >
            </div>
            <div>
                <label>Data de vencimento</label>
                <input type="text" value="{{$produtoData->dataDeVencimento ?? '' ? date('d/m/Y', strtotime($produtoData->dataDeVencimento)) : ''}}" name="dataDeVencimento">
                <label>Data de Cadastro</label>
                <input type="text" value="{{$produtoData->created_at ?? '' ? date('d/m/Y', strtotime($produtoData->created_at)) : ''}}" name="created_at" disabled>
            </div>
            <div>
                <label>Descricao</label>
                <input type="text" value="{{$produtoData->descricao ?? ''}}" name="descricao">
                <label>Tipo</label>
                <x-produto-tipo :selected="$produtoData->tipo ?? ''"/>
            </div>
        </div>
        <button type="submit">Salvar</button>
    </form>
</x-app-layout>