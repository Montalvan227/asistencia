<aside :class="menuOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
    class="fixed z-30 inset-y-0 left-0 w-64 bg-white no-scrollbar dark:text-black transition duration-300 overflow-y-auto lg:translate-x-0 lg:inset-0">
    <!-- start::Logo -->
    <div class="flex items-center justify-center h-16">
        <h1 class="text-black text-lg font-bold uppercase tracking-widest">
            Sistema Educativo
        </h1>
    </div>
    <nav class="py-10">
        <!-- start::Menu link -->
        <a x-data="{ linkHover: false }" @mouseover="linkHover = true" @mouseleave="linkHover = false"
            href="{{ route('dashboard') }}"
            class="flex items-center text-gray-800 px-6 py-3 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transition duration-200"
                :class="linkHover ? 'text-gray-100' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span class="ml-3 transition duration-200" :class="linkHover ? 'text-gray-100' : ''">
                Inicio
            </span>
        </a>
        <!-- end::Menu link -->

        <p class="text-xs text-black mt-10 mb-2 px-6 uppercase">Usuarios</p>

        <!-- start::Menu link roles -->
        @if (auth()->user()->can('administrador'))
            <div x-data="{ linkHover: false, linkActive: false }">
                <div @mouseover="linkHover = true" @mouseleave="linkHover = false" @click="linkActive = !linkActive"
                    class="flex items-center justify-between text-gray-900 hover:text-gray-100 px-6 py-3 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200"
                    :class="linkActive ? 'bg-black bg-opacity-30 text-gray-100' : ''">
                    <div class="flex items-center">
                        <span class="ml-3">Roles</span>
                    </div>
                    <svg class="w-3 h-3 transition duration-300" :class="linkActive ? 'rotate-90' : ''" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                        </path>
                    </svg>
                </div>
                <!-- start::Submenu -->
                <ul x-show="linkActive" x-cloak x-collapse.duration.300ms class="text-gray-800 ">
                    <!-- start::Submenu link -->
                    <li
                        class="pl-10 pr-6 py-2 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200 hover:text-gray-100">
                        <a href="{{ route('roles.index') }}" class="flex items-center">
                            <span class="mr-2 text-sm">&bull;</span>
                            <span class="overflow-ellipsis">Crear Roles</span>
                        </a>
                    </li>

                </ul>
                <!-- end::Submenu -->
            </div>
        @endcan
        <!-- end::Menu link -->

        <!-- start::Menu link permisos -->
        @if (auth()->user()->can('administrador'))
            <div x-data="{ linkHover: false, linkActive: false }">
                <div @mouseover="linkHover = true" @mouseleave="linkHover = false" @click="linkActive = !linkActive"
                    class="flex items-center justify-between text-black hover:text-gray-100 px-6 py-3 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200"
                    :class="linkActive ? 'bg-black bg-opacity-30 text-gray-100' : ''">
                    <div class="flex items-center">
                        <span class="ml-3">Permisos</span>
                    </div>
                    <svg class="w-3 h-3 transition duration-300" :class="linkActive ? 'rotate-90' : ''"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                        </path>
                    </svg>
                </div>
                <!-- start::Submenu -->
                <ul x-show="linkActive" x-cloak x-collapse.duration.300ms class="text-gray-400">
                    <!-- start::Submenu link -->
                    <li
                        class="pl-10 pr-6 py-2 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200 hover:text-gray-100">
                        <a href="{{ route('permisos.index') }}" class="flex items-center">
                            <span class="mr-2 text-sm">&bull;</span>
                            <span class="overflow-ellipsis text-black">Crear Permisos</span>
                        </a>
                    </li>
                    <!-- end::Submenu link -->
                </ul>
                <!-- end::Submenu -->
            </div>
        @endcan
        <!-- end::Menu link -->

        <!-- start::Menu link  usuarios-->
        @if (auth()->user()->can('administrador'))
            <div x-data="{ linkHover: false, linkActive: false }">
                <div @mouseover="linkHover = true" @mouseleave="linkHover = false"
                    @click="linkActive = !linkActive"
                    class="flex items-center justify-between text-gray-900 hover:text-gray-100 px-6 py-3 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200"
                    :class="linkActive ? 'bg-black bg-opacity-30 text-gray-100' : ''">
                    <div class="flex items-center">
                        <span class="ml-3">Usuarios</span>
                    </div>
                    <svg class="w-3 h-3 transition duration-300" :class="linkActive ? 'rotate-90' : ''"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                        </path>
                    </svg>
                </div>
                <!-- start::Submenu -->
                <ul x-show="linkActive" x-cloak x-collapse.duration.300ms class="text-gray-900 ">
                    <!-- start::Submenu link -->
                    <li
                        class="pl-10 pr-6 py-2 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200 hover:text-gray-100">
                        <a href="{{ route('asignar.index') }}" class="flex items-center">
                            <span class="mr-2 text-sm">&bull;</span>
                            <span class="overflow-ellipsis">Asignar Roles</span>
                        </a>
                    </li>
                    <!-- end::Submenu link -->
                </ul>
                <!-- end::Submenu -->
            </div>
        @endcan
        <!-- end::Menu link -->

        <!-- start::Menu link  alumnos-->
        @if (auth()->user()->can('administrador') || auth()->user()->can('profesor'))
            <div x-data="{ linkHover: false, linkActive: false }">
                <div @mouseover="linkHover = true" @mouseleave="linkHover = false"
                    @click="linkActive = !linkActive"
                    class="flex items-center justify-between text-gray-900 hover:text-gray-100 px-6 py-3 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200"
                    :class="linkActive ? 'bg-black bg-opacity-30 text-gray-100' : ''">
                    <div class="flex items-center">
                        <span class="ml-3">Alumnos</span>
                    </div>
                    <svg class="w-3 h-3 transition duration-300" :class="linkActive ? 'rotate-90' : ''"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5l7 7-7 7">
                        </path>
                    </svg>
                </div>
                <!-- start::Submenu -->
                <ul x-show="linkActive" x-cloak x-collapse.duration.300ms class="text-gray-900">
                        
                        <!-- start::Submenu link -->
                        <li
                            class="pl-10 pr-6 py-2 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200 hover:text-gray-100">
                            <a href="{{ route('alumnos.index') }}" class="flex items-center">
                                <span class="mr-2 text-sm">&bull;</span>
                                <span class="overflow-ellipsis">Ver Alumnos</span>
                            </a>
                        </li>
                        <!-- end::Submenu link -->
                        @if (auth()->user()->can('administrador'))
                            <!-- start::Submenu link -->
                            <li
                                class="pl-10 pr-6 py-2 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200 hover:text-gray-100">
                                <a href="{{ route('cursos.index') }}" class="flex items-center">
                                    <span class="mr-2 text-sm">&bull;</span>
                                    <span class="overflow-ellipsis">Ver Cursos</span>
                                </a>
                            </li>
                            <!-- end::Submenu link -->
                        @endcan
                    @if (auth()->user()->can('profesor') || auth()->user()->can('administrador'))
                        <!-- start::Submenu link -->
                        <li
                            class="pl-10 pr-6 py-2 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200 hover:text-gray-100">
                            <a href="{{ route('notas.index') }}" class="flex items-center">
                                <span class="mr-2 text-sm">&bull;</span>
                                <span class="overflow-ellipsis">Ver Notas</span>
                            </a>
                        </li>
                        <!-- end::Submenu link -->
                    @endcan
                </ul>
                <!-- end::Submenu -->
            </div>
        @endcan
        <!-- end::Menu link -->

        <!-- start::Menu link profesores-->
        @if (auth()->user()->can('administrador'))
            <div x-data="{ linkHover: false, linkActive: false }">
                <div @mouseover="linkHover = true" @mouseleave="linkHover = false"
                    @click="linkActive = !linkActive"
                    class="flex items-center justify-between text-gray-900 hover:text-gray-100 px-6 py-3 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200"
                    :class="linkActive ? 'bg-black bg-opacity-30 text-gray-100' : ''">
                    <div class="flex items-center">
                        <span class="ml-3">Profesores</span>
                    </div>
                    <svg class="w-3 h-3 transition duration-300"
                        :class="linkActive ? 'rotate-90' : ''" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5l7 7-7 7">
                        </path>
                    </svg>
                </div>
                <!-- start::Submenu -->
                <ul x-show="linkActive" x-cloak x-collapse.duration.300ms class="text-gray-900">
                    <!-- start::Submenu link -->
                    <li
                        class="pl-10 pr-6 py-2 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200 hover:text-gray-100">
                        <a href="{{ route('profesores.index') }}" class="flex items-center">
                            <span class="mr-2 text-sm">&bull;</span>
                            <span class="overflow-ellipsis">Ver Profesores</span>
                        </a>
                    </li>
                    <!-- end::Submenu link -->
                    {{-- <!-- start::Submenu link -->
                    <li
                        class="pl-10 pr-6 py-2 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200 hover:text-gray-100">
                        <a href="{{ route('cursos.index') }}" class="flex items-center">
                            <span class="mr-2 text-sm">&bull;</span>
                            <span class="overflow-ellipsis">View Cursos</span>
                        </a>
                    </li>
                    <!-- end::Submenu link --> --}}
                </ul>
                <!-- end::Submenu -->
            </div>
        @endcan
        <!-- end::Menu link -->

        <!-- start::Menu link asistencias -->
        @if (auth()->user()->can('administrador') ||
                auth()->user()->can('profesor') ||
                auth()->user()->can('alumno'))
            <div x-data="{ linkHover: false, linkActive: false }">
                <div @mouseover="linkHover = true" @mouseleave="linkHover = false"
                    @click="linkActive = !linkActive"
                    class="flex items-center justify-between text-gray-900 hover:text-gray-100 px-6 py-3 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200"
                    :class="linkActive ? 'bg-black bg-opacity-30 text-gray-100' : ''">
                    <div class="flex items-center">
                        <span class="ml-3">Asistencias</span>
                    </div>
                    <svg class="w-3 h-3 transition duration-300"
                        :class="linkActive ? 'rotate-90' : ''" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5l7 7-7 7">
                        </path>
                    </svg>
                </div>
                <!-- start::Submenu -->
                <ul x-show="linkActive" x-cloak x-collapse.duration.300ms class="text-gray-900">
                    <!-- start::Submenu link -->
                    @if (auth()->user()->can('administrador'))
                        <li
                            class="pl-10 pr-6 py-2 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200 hover:text-gray-100">
                            <a href="{{ route('asistencia.create') }}" class="flex items-center">
                                <span class="mr-2 text-sm">&bull;</span>
                                <span class="overflow-ellipsis">Registrar Asistencias</span>
                            </a>
                        </li>
                    @endcan

                    <!-- end::Submenu link -->

                    <!-- start::Submenu link -->
                    <li
                        class="pl-10 pr-6 py-2 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200 hover:text-gray-100">
                        <a href="{{ route('asistencia.index') }}" class="flex items-center">
                            <span class="mr-2 text-sm">&bull;</span>
                            <span class="overflow-ellipsis">Ver Asistencias</span>
                        </a>
                    </li>
                    <!-- end::Submenu link -->
            </ul>
            <!-- end::Submenu -->
        </div>
    @endcan
    <!-- end::Menu link -->

    <!-- start::Menu link Partes -->
    @if (auth()->user()->can('administrador') ||
            auth()->user()->can('profesor') ||
            Auth::user()->can('alumno'))
        <div x-data="{ linkHover: false, linkActive: false }">
            <div @mouseover="linkHover = true" @mouseleave="linkHover = false"
                @click="linkActive = !linkActive"
                class="flex items-center justify-between text-gray-900 hover:text-gray-100 px-6 py-3 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200"
                :class="linkActive ? 'bg-black bg-opacity-30 text-gray-100' : ''">
                <div class="flex items-center">
                    <span class="ml-3">Partes de Conducta</span>
                </div>
                <svg class="w-3 h-3 transition duration-300"
                    :class="linkActive ? 'rotate-90' : ''" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5l7 7-7 7">
                    </path>
                </svg>
            </div>
            <!-- start::Submenu -->
            <ul x-show="linkActive" x-cloak x-collapse.duration.300ms
                class="text-gray-900">
                <!-- start::Submenu link -->
                <li
                    class="pl-10 pr-6 py-2 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200 hover:text-gray-100">
                    <a href="{{ route('conducta.index') }}" class="flex items-center">
                        <span class="mr-2 text-sm">&bull;</span>
                        <span class="overflow-ellipsis">Partes de Conducta</span>
                    </a>
                </li>
                <!-- end::Submenu link -->
            </ul>
            <!-- end::Submenu -->
        </div>
    @endcan
    <!-- end::Menu link -->

    <!-- start::Menu link Justificaciones -->
    @if (auth()->user()->can('administrador') ||
            auth()->user()->can('profesor') ||
            Auth::user()->can('alumno'))
        <div x-data="{ linkHover: false, linkActive: false }">
            <div @mouseover="linkHover = true" @mouseleave="linkHover = false"
                @click="linkActive = !linkActive"
                class="flex items-center justify-between text-gray-900 hover:text-gray-100 px-6 py-3 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200"
                :class="linkActive ? 'bg-black bg-opacity-30 text-gray-100' : ''">
                <div class="flex items-center">
                    <span class="ml-3">Justificaciones</span>
                </div>
                <svg class="w-3 h-3 transition duration-300"
                    :class="linkActive ? 'rotate-90' : ''" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M9 5l7 7-7 7">
                    </path>
                </svg>
            </div>
            <!-- start::Submenu -->
            <ul x-show="linkActive" x-cloak x-collapse.duration.300ms
                class="text-gray-900">
                <!-- start::Submenu link -->
                <li
                    class="pl-10 pr-6 py-2 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200 hover:text-gray-100">
                    <a href="{{ route('justificaciones.index') }}"
                        class="flex items-center">
                        <span class="mr-2 text-sm">&bull;</span>
                        <span class="overflow-ellipsis">Justificaciones</span>
                    </a>
                </li>
                <!-- end::Submenu link -->
            </ul>
            <!-- end::Submenu -->
        </div>
    @endcan
    <!-- end::Menu link -->
</nav>
</aside>
