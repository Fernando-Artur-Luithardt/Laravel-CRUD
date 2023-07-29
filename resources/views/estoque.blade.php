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
                <td> {{ $item->sku }}</td>
                <td> {{ $item->nome }}</td>
                <td> {{ $item->qtdEstoque ? $item->qtdEstoque : 0 }}</td>
                <td> <button type="button" href="/estode/pruduto/{{ $item->sku }}">Editar</button></td>
            </tr>
        @endforeach
    </table>
</x-app-layout>