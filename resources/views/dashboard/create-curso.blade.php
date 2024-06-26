<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Cursos') }}
        </h2>
    </x-slot>
    <div class="container mx-auto p-6">
        @if (session('success'))
            <div class="bg-green-200 text-green-800 border border-green-400 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-600" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 5.652a.5.5 0 0 1 0 .707L10.707 10l3.64 3.64a.5.5 0 0 1-.708.708L10 10.707l-3.64 3.64a.5.5 0 0 1-.708-.708L9.293 10 5.652 6.348a.5.5 0 0 1 .708-.708L10 9.293l3.64-3.64a.5.5 0 0 1 .708 0z" />
                    </svg>
                </span>
            </div>
        @endif

        <form method="POST" action="{{ route('cursos.store') }}"
            class="bg-transparent text-black shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <div class="mb-4">
                <label for="nombre" class="block  text-sm font-bold mb-2">Nombre del Curso</label>
                <input type="text"
                    class="shadow appearance-none border rounded w-full py-2 px-3 bg-transparent leading-tight focus:outline-none focus:shadow-outline"
                    id="nombre" name="nombre" placeholder="Nombre del Curso" required>
            </div>

            <div class="mb-4">
                <label for="descripcion" class="block  text-sm font-bold mb-2">Descripción del
                    Curso</label>
                <textarea
                    class="shadow appearance-none border rounded w-full py-2 px-3 bg-transparent leading-tight focus:outline-none focus:shadow-outline"
                    id="descripcion" name="descripcion" placeholder="Descripción del Curso" rows="4" required></textarea>
            </div>

            <div class="mb-4">
                <label for="profesor_id" class="block  text-sm font-bold mb-2">Profesor</label>
                <select
                    class="shadow appearance-none border rounded w-full py-2 px-3 bg-transparent leading-tight focus:outline-none focus:shadow-outline"
                    id="profesor_id" name="profesor_id" required>
                    {{-- <option value="" class="bg-gray-700 text-white" disabled selected>Seleccione un profesor</option> --}}
                    @foreach ($profesores as $profesor)
                        <option class="bg-gray-700 text-white" value="{{ $profesor->id }}">{{ $profesor->nombres }}
                            {{ $profesor->apellido_paterno }}
                            {{ $profesor->apellido_materno }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="dias_semana" class="block  text-sm font-bold mb-2">Días de la Semana:</label>
                <select
                    class="shadow appearance-none border rounded w-full py-2 px-3 bg-transparent leading-tight focus:outline-none focus:shadow-outline"
                    id="dias_semana" name="dias_semana" required>
                    {{-- <option value="" class="bg-gray-900" disabled selected>Seleccione un Dia</option> --}}
                    <option class="bg-gray-700 text-white" value="lunes">Lunes</option>
                    <option class="bg-gray-700 text-white" value="martes">Martes</option>
                    <option class="bg-gray-700 text-white" value="miercoles">Miercoles</option>
                    <option class="bg-gray-700 text-white" value="jueves">Jueves</option>
                    <option class="bg-gray-700 text-white" value="viernes">Viernes</option>
                    <option class="bg-gray-700 text-white" value="sabado">Sábado</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="horario_entrada" class="block  text-sm font-bold mb-2">Horario de
                    Entrada:</label>
                <input type="time" id="horario_entrada" name="horario_entrada"
                    class="shadow appearance-none border rounded w-full py-2 px-3 bg-transparent leading-tight focus:outline-none focus:shadow-outline"
                    required>
            </div>

            <div class="mb-4">
                <label for="horario_salida" class="block  text-sm font-bold mb-2">Horario de
                    Salida:</label>
                <input type="time" id="horario_salida" name="horario_salida"
                    class="shadow appearance-none border rounded w-full py-2 px-3 bg-transparent leading-tight focus:outline-none focus:shadow-outline"
                    required>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Crear Curso
                </button>
            </div>
        </form>
    </div>
</x-app-layout>