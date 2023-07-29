<x-app-layout>
    <form method="POST" action="{{ route('gerencia.add') }}" enctype="multipart/form-data">
        <label>quantidade</label>
        <input value="" type="number" min="0" step="1" >
        <x-produtos selected="127"/>
        <select>
            <option value="1">Vendido</option>
            <option value="0">Recebido</option>
        </select>
    </form>
</x-app-layout>