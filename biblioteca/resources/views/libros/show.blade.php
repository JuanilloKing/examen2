<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ver libro: {{ $libro->titulo }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 bg-black">
                    <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                        <div class="flex flex-col py-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">
                                Titulo
                            </dt>
                            <dd class="text-lg font-semibold">
                                {{ $libro->titulo }}
                            </dd>
                        </div>
                        <div class="flex flex-col py-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">
                                Autor
                            </dt>
                            <dd class="text-lg font-semibold">
                                {{ $libro->autor->nombre }}
                            </dd>
                        </div>
                    </dl>
                </div>

                <div class="mt-6">
                    <h3 class="text-lg font-semibold mb-4">Ejemplares</h3>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Código</th>
                                    <th scope="col" class="px-6 py-3">Estado</th>
                                    <th scope="col" class="px-6 py-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ejemplares as $ejemplar)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4">{{ $ejemplar->codigo }}</td>
                                        <td class="px-6 py-4">
                                            @if ($ejemplar->prestamos()->where('fecha_devolucion', null)->first())
                                                <span class="text-red-500 font-semibold">Prestado</span>
                                            @else
                                                <span class="text-green-500 font-semibold">Disponible</span>
                                            @endif
                                        </td>
                                        <td><a href="{{ route('ejemplares.show', $ejemplar) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-3">Ver</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6 text-center">
        <a href="{{ route('libros.index') }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-2xl text-sm px-20 py-4 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Volver
        </a>
    </div>
</x-app-layout>
