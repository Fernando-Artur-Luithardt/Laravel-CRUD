<div>
    <select name="tipo">
        @foreach ($tipos as $tipo)
            <option {{$tipo->id == $selected ? 'selected' : ''}} value="{{$tipo->id}}">{{$tipo->tipo}}</option>
        @endforeach
    </select>
</div>