<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Asistencias') }}
        </h2>
    </x-slot>
    <div class="container mx-auto dark:text-white">
        <h2 class="text-2xl font-semibold mb-4">Buscar Asistencia</h2>
        <form action="{{ route('asistencia.index') }}" method="GET" class="mb-4">
            @csrf
            <div class="flex items-center space-x-4">
                <div class="w-1/3">
                    <select name="grado" class="w-full border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring focus:ring-indigo-200 dark:text-zinc-950">
                        <option value="">Seleccionar Grado&nbsp;&nbsp;&nbsp;&nbsp;</option>
                        @foreach ($grados as $grado)
                            <option value="{{ $grado }}">{{ $grado }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-1/3">
                    <select name="seccion" class="w-full border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring focus:ring-indigo-200 dark:text-zinc-950">
                        <option value="">Seleccionar Sección&nbsp;&nbsp;&nbsp;&nbsp;</option>
                        @foreach ($secciones as $seccion)
                            <option value="{{ $seccion }}">{{ $seccion }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="bg-indigo-500 text-white py-2 px-4 rounded-md hover:bg-indigo-600 focus:outline-none focus:ring focus:ring-indigo-200">Buscar</button>
                 @if (auth()->user()->can('administrador') || auth()->user()->can('profesor'))
                    <a href="{{ route('export') }}" class="bg-green-600 text-black font-bold py-3 px-5 rounded-md flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-spreadsheet text-white" viewBox="0 0 16 16">
                          <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5zM3 12v-2h2v2zm0 1h2v2H4a1 1 0 0 1-1-1zm3 2v-2h3v2zm4 0v-2h3v1a1 1 0 0 1-1 1zm3-3h-3v-2h3zm-7 0v-2h3v2z"/>
                        </svg>
                    </a>
                @endcan
            </div>
        </form>

        <h3 class="text-xl font-semibold mb-4">Resultados de la búsqueda:</h3>
        <br>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">
                        DNI
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Nombres
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Apellidos
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Grado Y sección
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Hora de ingreso
                    </th>
                    <th scope="col text-center" class="px-9 py-3 text-center ">
                        Estado
                    </th>

                </tr>
            </thead>
            <tbody>
                @if (isset($mensaje))
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <p class="text-white">{{ $mensaje }}</p>
                    </tr>
                @else
                    @foreach ($asistencias as $asistencia)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $asistencia->alumno->dni }}
                            </th>
                            <td class="px-6 py-4 text-center">
                                {{ $asistencia->alumno->nombres }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $asistencia->alumno->apellido_paterno }}
                                {{ $asistencia->alumno->apellido_materno }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $asistencia->alumno->grado }}
                                {{ $asistencia->alumno->seccion }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $asistencia->created_at }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $asistencia->estado }}
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
    </div>
    <br>
</x-app-layout>
