<x-app-layout>
    <form method="POST" action="{{ route('gerencia.addGerencia') }}" enctype="multipart/form-data">
        @csrf
        <p class="estoque-indicator">Qtd Estoque: 0<p>

        <div class="rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                        Quantidade
                    </label>
                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="number" min="0" step="1" name="quantidade" required>
                </div>

                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label name="sku" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                        Ação
                    </label>
                    <select name="vendidoRecebido">
                        <option value="1">Vendido</option>
                        <option value="0">Recebido</option>
                    </select>
                </div>

                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label name="dataDeVencimento" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                        Produto
                    </label>
                    <x-produtos selected=""/>
                </div>
            </div>
            <button type="submit" style="padding: 6px; background-color: #6DB569; border-radius: 10% 10%; max-width: 75px;" class="">SALVAR</button>
        </div>
    </form>
</x-app-layout>
<script>
    $(document).ready(function(){
        $(document).on('change', '[name="produtoSku"], [name="vendidoRecebido"]', function(){
            let qtdEstoque = $(document).find('[name="produtoSku"] option:selected').attr('qtdestoque') != undefined ? $(document).find('[name="produtoSku"] option:selected').attr('qtdestoque') : 0;
            if($('[name="vendidoRecebido"]').val() == 0){
                $('[name="quantidade"]').removeAttr('max')
            } else {
                $('[name="quantidade"]').prop('max', qtdEstoque)
                if($('[name="quantidade"]').val() > qtdEstoque){
                    $('[name="quantidade"]').val(qtdEstoque)
                }
            }
            $('.estoque-indicator').text('Qtd Estoque: '+qtdEstoque)
        })

        $(document).on('change', '[name="quantidade"]', function(){
            let qtdEstoque = $(document).find('[name="produtoSku"] option:selected').attr('qtdestoque') != undefined ? $(document).find('[name="produtoSku"] option:selected').attr('qtdestoque') : 0;
            if($(this).val() > qtdEstoque && $('[name="vendidoRecebido"]').val() == 1){
                $(this).val(qtdEstoque)
            }
        })
    })
</script>