<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            alumnos
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Criterio
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Notas
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notas as $nota)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4">
                                        {{ $nota->ce->ce }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $nota->nota }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-6 text-center">
                        <a href="{{ route('alumnos.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            volver
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
