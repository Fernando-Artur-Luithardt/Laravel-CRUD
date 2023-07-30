<x-app-layout>
    <div class="flex first-line:w-full h-full justify-center items-center">
        <div class="w-3/4 h-3/4 shadow-lg p-4 rounded-xl">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th>Nome</th>
                        <th>Data</th>
                        <th>Quantidade</th>
                        <th>Valor unitário</th>
                        <th>Valor total</th>
                        <th>Usuário</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($historicos as $historico)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$historico->nome}}</td>
                        <td>{{$historico->created_at ?? '' ? date('d/m/Y H:i', strtotime($historico->created_at)) : ''}}</td>
                        <td>{{$historico->quantidade}}</td>
                        <td>{{$historico->valor}}</td>
                        <td>R$ {{number_format($historico->valor * $historico->quantidade, 2)}}</td>
                        <td>{{$historico->name}}</td>
                        <td>{{$historico->quantidade > 0 ? 'RECEBIDO' : 'VENDA'}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>