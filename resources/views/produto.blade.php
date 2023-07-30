<x-app-layout>
    <form method="POST" action="{{ route('produto.addProduto') }}" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div>
                Estoque: {{$qtdEstoque->qtdEstoque ?? '0'}}
            </div>
            <div>
                <label>SKU</label>
                <input type="text" value="{{$produtoData->sku ?? ''}}" name="sku">
                <label>Nome</label>
                <input type="text" value="{{$produtoData->nome ?? ''}}" name="nome"   >
            </div>
            <div>
                <label>Data de vencimento</label>
                <input type="date" class="data-type" value="{{$produtoData->dataDeVencimento ?? '' ? date('Y-m-d', strtotime($produtoData->dataDeVencimento)) : ''}}" name="dataDeVencimento">
                <label>Data de Cadastro</label>
                <input type="date" value="{{$produtoData->created_at ?? '' ? date('Y-m-d', strtotime($produtoData->created_at)) : date('Y-m-d')}}" name="created_at" disabled>
            </div>
            <div>
                <label>Descricao</label>
                <input type="text" value="{{$produtoData->descricao ?? ''}}" name="descricao">
                <label>Tipo</label>
                <x-produto-tipo :selected="$produtoData->tipo ?? ''"/>
                @if($produtoData->image ?? '')
                    <img src="{{ asset('images/'.$produtoData->image  ) }}" />
                @else
                    <input type="file" class="form-control" name="image" />
                @endif
            </div>
        </div>
        <button type="submit">Salvar</button>
    </form>
</x-app-layout>
<script defer>
    $(document).ready(function () {
        $(document).find('[name="dataDeVencimento"]').each(function(key, item){
            $(item).trigger('change')
        })
        //$(document).find(".data-type").mask("99/99/9999", {placeholder: 'MM/DD/YYYY' });
        //console.log($(document).find('.data-type')).mask("99/99/9999", {placeholder: 'MM/DD/YYYY' });
    });
</script>