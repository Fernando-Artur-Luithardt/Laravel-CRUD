<div>
    <select name="produtoId">
        @foreach ($produtos as $produto)
            <option {{$produto->id == $selected ? 'selected' : ''}} value="{{$produto->id}}">{{$produto->nome}}</option>
        @endforeach
    </select>
</div>