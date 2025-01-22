<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black-800 leading-tight">
            Ver pelicula: {{ $pelicula->titulo }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <dl class="max-w-md text-black-900 divide-y divide-black-200 dark:text-black dark:divide-black-700">
                        <div class="flex flex-col py-3">
                            <dt class="mb-1 text-black-500 md:text-lg dark:text-black-400">
                                Titulo
                            </dt>
                            <dd class="text-lg font-semibold">
                                {{ $pelicula->titulo }}
                            </dd>
                        </div>
                        <div class="flex flex-col py-3">
                            <dt class="mb-1 text-black-500 md:text-lg dark:text-black-400">
                                Entradas
                            </dt>
                            <dd class="text-lg font-semibold">
                                {{ $sumentradas }}
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6 text-center">
        <a href="{{ route('peliculas.index') }}"
            class="text-black bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-2xl text-sm px-20 py-4 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Volver
        </a>
    </div>
</x-app-layout>