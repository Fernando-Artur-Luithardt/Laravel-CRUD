<x-app-layout>
    <form>
        <div class="container">
            <input type="text" value="{{$produtoData->sku}}" name="sku" disabled>
            <input type="text" value="{{$produtoData->dataDeVencimento ? date('d/m/Y', strtotime($produtoData->dataDeVencimento)) : ''}}" name="dataDeVencimento">
            <input type="text" value="{{date('d/m/Y', strtotime($produtoData->dataDeCadastro))}}" name="dataDeCadastro">
            <input type="text" value="{{$produtoData->descricao}}" name="descricao">
            <x-produto-tipo :selected="$produtoData->tipo"/>
        </div>
    </form>
</x-app-layout>