<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profesores') }}
        </h2>
    </x-slot>
    <x-section-border />
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-center text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        DNI
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombres
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Apellido Paterno
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Apellido Materno
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Genero
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Telefono
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha de Nacimiento
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ciudad
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Direccion
                    </th>
                    <th scope="col text-center" class="px-9 py-3 ">
                        Estado
                    </th>
                    <th scope="col" class="px-9 py-3 ">
                        Accion
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($profesores as $profesor)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $profesor->dni }}
                        </th>

                        <td class="px-6 py-4">
                            {{ $profesor->nombres }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $profesor->apellido_paterno }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $profesor->apellido_materno }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $profesor->genero }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $profesor->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $profesor->telefono }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $profesor->fecha_nacimiento }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $profesor->ciudad }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $profesor->direccion }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $profesor->estado }}
                        </td>

                        <td class="px-6 py-4">
                            @if (auth()->user()->can('editar usuarios') ||
                                    auth()->user()->can('administrador')) <a
                                    href=" {{ route('profesores.edit', $profesor) }} "
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline content-center">Editar</a>
                            @endcan
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
<div class="pagination">
</div>

<x-section-border />
</x-app-layout>
