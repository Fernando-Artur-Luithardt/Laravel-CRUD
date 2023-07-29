<x-app-layout>
    <table>
        <tr>
            <th>Nome</th>
            <th>Data</th>
            <th>Quantidade</th>
        </tr>
        @foreach ($historicos as $historico)
        <tr>
            <td>{{$historico->nome}}</td>
            <td>{{$historico->data ?? '' ? date('d/m/Y H:i', strtotime($historico->data)) : ''}}</td>
            <td>{{$historico->quantidade}}</td>
        </tr>
        @endforeach
    </table>
</x-app-layout>