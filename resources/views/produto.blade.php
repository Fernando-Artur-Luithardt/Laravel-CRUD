<x-app-layout>
    <form method="POST" action="{{ route('produto.addProduto') }}" enctype="multipart/form-data">
        @csrf
        <div>
            Estoque: {{$qtdEstoque->qtdEstoque ?? '0'}}
        </div>
        <div>
            Criado por: {{$produtoData->userName ?? ''}}
        </div>
        <div class="rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                        SKU
                    </label>
                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" {{$produtoData->sku ?? '' ? 'readonly' : ''}} value="{{$produtoData->sku ?? ''}}">
                </div>

                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label name="sku" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                        Nome
                    </label>
                    <input name="nome" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" value="{{$produtoData->nome ?? ''}}">
                </div>

                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label name="dataDeVencimento" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                        Data de vencimento
                    </label>
                    <input name="dataDeVencimento" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="date" value="{{$produtoData->dataDeVencimento ?? '' ? date('Y-m-d', strtotime($produtoData->dataDeVencimento)) : ''}}">
                </div>
                
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label name="created_at" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                        Data de Cadastro
                    </label>
                    <input name="created_at" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="date" value="{{$produtoData->created_at ?? '' ? date('Y-m-d', strtotime($produtoData->created_at)) : date('Y-m-d')}}" disabled>
                </div>

                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label name="descricao" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                        Descrição
                    </label>
                    <input name="descricao" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="date" value="{{$produtoData->descricao ?? ''}}">
                </div>

                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label name="descricao" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                        Tipo
                    </label>
                    <x-produto-tipo :selected="$produtoData->tipo ?? ''"/>
                </div>
                <button type="submit" style="padding: 6px; background-color: #6DB569; border-radius: 10% 10%; max-width: 75px;" class="">SALVAR</button>
            </div>
        </div>
    </form>
</x-app-layout>
<script defer>
    $(document).ready(function () {
        $(document).find('[name="dataDeVencimento"]').each(function(key, item){
            $(item).trigger('change')
        })
    });
</script>