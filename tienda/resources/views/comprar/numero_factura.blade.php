<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Artículos
        </h2>
    </x-slot>

    <div class="container">
        <h1>Ingresar número de factura</h1>
        <form method="POST" action="{{ route('comprar') }}">
            @csrf
            <div>
                <label for="numero_factura" class="block text-sm font-medium text-gray-700">Número de Factura</label>
                <input type="text" id="numero_factura" name="numero_factura" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>
            <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900 mt-4">
                Realizar compra
            </button>
        </form>

    </div>
</x-app-layout>
