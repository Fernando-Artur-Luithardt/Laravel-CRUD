<x-app-layout>
    <button type="buttom" href="{{ route('produto') }}">NOVO</button>
    <div class="flex first-line:w-full h-full justify-center items-center">
        <div class="w-3/4 h-3/4 shadow-lg p-4 rounded-xl">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th>SKU</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Editar</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($estoque as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"> {{ $item->sku }}</td>
                        <td> {{ $item->nome }}</td>
                        <td> {{ $item->qtdEstoque ? $item->qtdEstoque : 0 }}</td>
                        <td> <button type="button" href="{{ route('produto', ['produto' => $item->sku]) }}">Editar</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
<script>
    $(document).on('click', 'button', function(){
        if($(this).attr('href') !== undefined && $(this).attr('href') !== '')
            window.location.href = $(this).attr('href');
    })
</script>