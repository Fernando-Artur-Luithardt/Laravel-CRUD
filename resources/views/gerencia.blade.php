<x-app-layout>
    <form method="POST" action="{{ route('gerencia.addGerencia') }}" enctype="multipart/form-data">
        @csrf
        <p class="estoque-indicator">Qtd Estoque: 0<p>
        <label>quantidade</label>
        <input value="" type="number" min="0" step="1" name="quantidade" required>
        <x-produtos selected=""/>
        <select name="vendidoRecebido">
            <option value="1">Vendido</option>
            <option value="0">Recebido</option>
        </select>
        <button type="submit">Salvar</button>
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