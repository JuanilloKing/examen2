<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
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
                                {{ $ejemplar->libro->titulo }}
                            </dd>
                        </div>
                        <div class="flex flex-col py-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">
                                Autor
                            </dt>
                            <dd class="text-lg font-semibold">
                                {{ $ejemplar->libro->autor->nombre }}
                            </dd>
                        </div>
                        <div class="flex flex-col py-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">
                                prestamo
                            </dt>
                            <dd class="text-lg font-semibold">
                                @if ( $ejemplar->prestamos()->where('fecha_devolucion', null)->first())
                                    @php
                                        $fecha = new Datetime($ejemplar->prestamos()->where('fecha_devolucion', null)->first()->fecha_hora);
                                        $dif = $fecha->diff(now())->days;
                                    @endphp
                                    @if ($dif > 30)
                                        <span class="text-red-500 font-semibold">Vencido</span>
                                    @else
                                        <span class="text-green-500 font-semibold">No Vencido</span>
                                    @endif
                                @else
                                    <span class="text-green-500 font-semibold">No Prestado</span>
                                @endif
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-6 text-center">
        <a href="{{ route('libros.show', $ejemplar->libro) }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-2xl text-sm px-20 py-4 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Volver
        </a>
    </div>
</x-app-layout>
