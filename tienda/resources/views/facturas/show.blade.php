<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ver Factura con Artículos
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                        <div class="flex flex-col pb-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Número</dt>
                            <dd class="text-lg font-semibold">{{ $factura->numero }}</dd>
                        </div>
                        <div class="flex flex-col py-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Fecha</dt>
                            <dd class="text-lg font-semibold">{{ $factura->created_at->format('d/m/Y') }}</dd>
                        </div>
                        <div class="flex flex-col pt-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Usuario</dt>
                            <dd class="text-lg font-semibold">{{ $factura->user->name }}</dd>
                        </div>
                    </dl>

                    <!-- Tabla de artículos asociados a la factura -->
                </div>
            </div>
            <div class="mt-6">
                <h3 class="text-lg font-semibold mb-4">Artículos en esta factura</h3>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Nombre</th>
                                <th scope="col" class="px-6 py-3">Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($factura->articulos as $articulo)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $articulo->denominacion }}</td>
                                <td class="px-6 py-4">{{ $articulo->precio }}€</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6 text-center">
        <a href="{{ route('facturas.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-2xl text-sm px-20 py-4 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Volver
        </a>
    </div>
</x-app-layout>
