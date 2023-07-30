<div>
    <select name="produtoSku" required>
        <option value="" hidden>Selecione...</option>
        @foreach ($produtos as $produto)
            <option qtdEstoque="{{$produto->qtdEstoque ?? 0}}" {{$produto->sku === $selected ? 'selected' : ''}} value="{{$produto->sku}}">{{$produto->nome}}</option>
        @endforeach
    </select>
</div>