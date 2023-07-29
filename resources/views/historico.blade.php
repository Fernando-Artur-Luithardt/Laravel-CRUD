<x-app-layout>
    <table>
        <tr>
            <th>Nome</th>
            <th>Data</th>
            <th>Quantidade</th>
            <th>Valor unitário</th>
            <th>Valor total</th>
        </tr>
        @foreach ($historicos as $historico)
        <tr>
            <td>{{$historico->nome}}</td>
            <td>{{$historico->data ?? '' ? date('d/m/Y H:i', strtotime($historico->data)) : ''}}</td>
            <td>{{$historico->quantidade}}</td>
            <td>{{$historico->valor}}</td>
            <td>R$ {{number_format($historico->valor * $historico->quantidade, 2)}}</td>
        </tr>
        @endforeach
    </table>
</x-app-layout>