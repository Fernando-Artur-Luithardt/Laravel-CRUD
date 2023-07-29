<x-app-layout>
    <table>
        <tr>
            <th>SKU</th>
            <th>Nome</th>
            <th>Quantidade</th>
            <th>Editar</th>
        </tr>

        @foreach ($estoque as $item)
            <tr>
                <th> {{ $item->sku }}</th>
                <th> {{ $item->nome }}</th>
                <th> {{ $item->qtdEstoque ? $item->qtdEstoque : 0 }}</th>
                <th> <button type="button" href="/estode/pruduto/{{ $item->sku }}">Editar</button></th>
            </tr>
        @endforeach
    </table>
</x-app-layout>