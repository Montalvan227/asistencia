<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Datos del Alumno') }}
        </h2>
    </x-slot>

    <div class="text-white rounded-lg p-6 shadow-md">
        @if (auth()->user()->can('administrador'))
        <x-section-border />
        <a href="{{ route('asignar-curso', ['id' => $alumno->id]) }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-blue active:bg-blue-800">Asignar
            Curso</a>
            <x-section-border />
        @endcan
        <div class="flex flex-row justify-center gap-10 my-3 py-2 text-black">
            <p>Nombre: {{ ucfirst($alumno->nombres) }}</p>
            <p>Apellido Paterno: {{ ucfirst($alumno->apellido_paterno) }}</p>
            <p>Apellido Materno: {{ ucfirst($alumno->apellido_materno) }}</p>
        </div>
        <x-section-border />

        @if ($cursos->count() > 0)
            <div class="flex-1 rounded-lg shadow-xl mt-4 p-8">
                <h4 class="text-xl text-black dark:text-white font-bold">Calendario de Horarios de Cursos</h4>
                <div class="relative px-4 py-2 text-black dark:text-white">
                    <div class="grid grid-cols-6 gap-2 ">
                        <div class="text-center">Lunes</div>
                        <div class="text-center">Martes</div>
                        <div class="text-center">Miércoles</div>
                        <div class="text-center">Jueves</div>
                        <div class="text-center">Viernes</div>
                        <div class="text-center">Sábado</div>


                        <div class=" p-2 text-center flow-root">
                            @if ($cursosLunes->isEmpty())
                                <p>Sin Asignar</p>
                            @else
                                @foreach ($cursosLunes as $curso)
                                    <ul>
                                        <li>{{ ucfirst($curso->nombre) }}</li>
                                        <li>{{ $curso->horario_entrada }}</li>
                                        <li>{{ $curso->horario_salida }}</li>
                                        <li><br></li>
                                    </ul>
                                @endforeach
                            @endif
                        </div>

                        <div class=" p-2 text-center">
                            @if ($cursosMartes->isEmpty())
                                <p>Sin Asignar</p>
                            @else
                                @foreach ($cursosMartes as $curso)
                                    <ul>
                                        <li>{{ ucfirst($curso->nombre) }}</li>
                                        <li>{{ $curso->horario_entrada }}</li>
                                        <li>{{ $curso->horario_salida }}</li>
                                        <li><br></li>
                                    </ul>
                                @endforeach
                            @endif
                        </div>

                        <div class=" p-2 text-center">
                            @if ($cursosMiercoles->isEmpty())
                                <p>Sin Asignar</p>
                            @else
                                @foreach ($cursosMiercoles as $curso)
                                    <ul>
                                        <li>{{ ucfirst($curso->nombre) }}</li>
                                        <li>{{ $curso->horario_entrada }}</li>
                                        <li>{{ $curso->horario_salida }}</li>
                                        <li><br></li>
                                    </ul>
                                @endforeach
                            @endif
                        </div>

                        <div class="p-2 text-center">
                            @if ($cursosJueves->isEmpty())
                                <p>Sin Asignar</p>
                            @else
                                @foreach ($cursosJueves as $curso)
                                    <ul>
                                        <li>{{ ucfirst($curso->nombre) }}</li>
                                        <li>{{ $curso->horario_entrada }}</li>
                                        <li>{{ $curso->horario_salida }}</li>
                                        <li><br></li>
                                    </ul>
                                @endforeach
                            @endif
                        </div>

                        <div class=" p-2 text-center">
                            @if ($cursosViernes->isEmpty())
                                <p>Sin Asignar</p>
                            @else
                                @foreach ($cursosViernes as $curso)
                                    <ul>
                                        <li>{{ ucfirst($curso->nombre) }}</li>
                                        <li>{{ $curso->horario_entrada }}</li>
                                        <li>{{ $curso->horario_salida }}</li>
                                        <li><br></li>
                                    </ul>
                                @endforeach
                            @endif
                        </div>

                        <div class=" p-2 text-center">
                            @if ($cursosSabado->isEmpty())
                                <p>Sin Asignar</p>
                            @else
                                @foreach ($cursosSabado as $curso)
                                    <ul>
                                        <li class="text-gray-700">{{ ucfirst($curso->nombre) }}</li>
                                        <li class="text-gray-700">{{ $curso->horario_entrada }}</li>
                                        <li>{{ $curso->horario_salida }}</li>
                                        <li><br></li>
                                    </ul>
                                @endforeach
                            @endif
                        </div>


                    </div>
                </div>
            </div>
        @else
            <p class="italic mt-2 text-black dark:text-white">El alumno no está inscrito en ningún curso.</p>
        @endif
        
        <x-section-border />

        <!-- Mostrar notas del alumno -->
        <h3 class="text-xl font-semibold mt-6 mb-2 text-black dark:text-white">Notas del Alumno</h3>

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400 ">
                @if ($notas->count() > 0)
                    @foreach ($notas->groupBy('curso_id') as $cursoId => $notasPorCurso)
                        <thead class="text-xs text-white uppercase bg-gray-800 dark:bg-gray-700 dark:text-gray-600">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Curso
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Notas
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalNotas = 0;
                                $contadorNotas = 0;
                            @endphp
                            @foreach ($notasPorCurso as $nota)
                                @php
                                    $totalNotas += $nota->valor;
                                    $contadorNotas++;
                                @endphp
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ ucfirst($notasPorCurso[0]->curso->nombre) }}</th>
                                    <td class="px-6 py-4">{{ $nota->valor }}</td>
                                </tr>
                                
                            @endforeach
                            @if ($contadorNotas > 0)
                                <tr class="text-white box-content bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Promedio Final: </th>
                                    <td class="px-6 py-4 text-black">{{ $totalNotas / $contadorNotas }}</td>
                                </tr>
                            @endif
                        </tbody>
                    @endforeach
                @else
                    <p class="italic mt-2 text-black dark:text-white">Sin Cursos asignados para tener notas</p>
                @endif
            </table>
        </div>
    </div>


</x-app-layout>
