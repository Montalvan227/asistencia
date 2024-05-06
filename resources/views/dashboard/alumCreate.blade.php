<?php
$fechaMaxima = date('Y-m-d', strtotime('-10 years'));
?>
<x-app-layout>
    <form method="POST" action="{{ route('alumnos.store') }}" class="dark:bg-gray-800 p-4 rounded-lg shadow-md">
        @csrf
        <div class="shadow-md text-black rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
            <div class="-mx-3 md:flex mb-2">

                <input type="hidden" name="user_id" value="{{ $user->id }}"
                    class="appearance-none block w-full border rounded py-3 px-4 mb-3">

                <div class="md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-black  text-xs font-bold mb-2" for="grid-state">
                        Nombre
                        de
                        Usuario:
                    </label>
                    <p
                        class="text-black dark:text-gray-300 appearance-none block w-full border rounded py-3 px-4 mb-3">
                        {{ $user->name }}</p>

                </div>
                <div class="md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide  text-xs font-bold mb-2 text-black" for="grid-state">
                        Correo
                        Electrónico:
                    </label>
                    <p
                        class="text-black dark:text-gray-300 appearance-none block w-full border rounded py-3 px-4 mb-3">
                        {{ $user->email }}</p>
                </div>
            </div>
        </div>



        <!-- component -->
        <div class="shadow-md rounded px-8 text-black pt-6 pb-8 mb-4 flex flex-col my-2">
            <div class="-mx-3 md:flex mb-6">
                <!-- DNI -->
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-black text-xs font-bold mb-2" for="grid-first-name">
                        DNI
                    </label>
                    <input class="appearance-none block w-full text-black bg-transparent border rounded py-3 px-4 mb-3"
                        type="text" placeholder="78945612" id="dni" name="dni" maxlength="8" pattern="\d{8}" title="Ingresa 8 dígitos" inputmode="numeric" required>
                </div>
                <!-- Nombres -->
                <div class="md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-black text-xs font-bold mb-2" for="grid-last-name">
                        Nombres
                    </label>
                    <input class="appearance-none block w-full text-black bg-transparent border rounded py-3 px-4" id="nombres"
                        name="nombres" type="text" required readonly>
                </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
                <!-- Apellido Paterno -->
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-black text-xs font-bold mb-2" for="grid-first-name">
                        Apellido Paterno
                    </label>
                    <input class="appearance-none block w-full bg-transparent border rounded py-3 px-4 mb-3 text-black"
                        id="apellido_paterno" name="apellido_paterno" type="text"
                        required readonly>
                </div>

                <!-- Apellido Materno -->
                <div class="md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-black text-xs font-bold mb-2" for="grid-last-name">
                        Apellido Materno
                    </label>
                    <input class="appearance-none block w-full bg-transparent border rounded py-3 px-4 text-black"
                        id="apellido_materno" name="apellido_materno" type="text"
                        required readonly>
                </div>
                <div class=" px-3 py-10">
                    <button id="boton" type="button"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Validar Alumno
                    </button>
                </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
                <!-- Grado -->
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="grado" class="px-1 text-sm text-black dark:text-white">Grado:</label>
                    <select name="grado" class="text-md block px-3 py-2 rounded-lg w-full bg-transparent border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        <option value="1ro de Secundaria">1ro de Secundaria</option>
                        <option value="2do de Secundaria">2do de Secundaria</option>
                        <option value="3ro de Secundaria">3ro de Secundaria</option>
                        <option value="4to de Secundaria">4to de Secundaria</option>
                        <option value="5to de Secundaria">5to de Secundaria</option>
                    </select>
                </div>

                <!-- Seccion -->
                <div class="md:w-1/2 px-3">
                    <label for="seccion" class="px-1 text-sm text-black dark:text-white">Sección:</label>
                    <select name="seccion" class="text-md block px-3 py-2 rounded-lg w-full bg-transparent border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                    </select>
                </div>

            </div>

            <div class="-mx-3 md:flex mb-2">

                <!-- Fecha de Nacimiento -->
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-black text-xs font-bold mb-2" for="grid-city">
                        Fecha de Nacimiento
                    </label>
                    <input class="appearance-none block w-full bg-transparent border rounded py-3 px-4 text-black" id="grid-city"
                        type="date" id="fecha_nacimiento" name="fecha_nacimiento" max="<?php echo $fechaMaxima; ?>" required>
                </div>

                <!-- Género -->
                <div class="md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-black text-xs font-bold mb-2" for="grid-state">
                        Género
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-transparent border py-3 px-4 pr-8 rounded"
                            id="genero" name="genero" required>
                            <option class="bg-gray-900 text-white"value="Masculino">Masculino</option>
                            <option class="bg-gray-900 text-white" value="Femenino">Femenino</option>
                        </select>
                    </div>
                </div>

                <!-- Ciudad -->
                <div class="md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-black text-xs font-bold mb-2" for="grid-zip">
                        Ciudad
                    </label>
                    <input class="appearance-none block w-full text-black text.black bg-transparent  border  rounded py-3 px-4"
                        id="grid-zip" type="text" id="ciudad" name="ciudad" required>
                </div>

            </div>
            <div class="-mx-3 md:flex mb-2">
                <!-- Dirección -->
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-black text-xs font-bold mb-2" for="grid-city">
                        Dirección
                    </label>
                    <input class="appearance-none block w-full bg-transparent border rounded py-3 px-4" id="grid-city"
                        type="text" id="direccion" name="direccion" required>
                </div>

                <!-- Estado -->
                <div class="md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-state">
                        Estado
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-transparent border  py-3 px-4 pr-8 rounded"
                            id="estado" name="estado" required>
                            <option class="bg-gray-900 text-white" value="Activo">Activo</option>
                            <option class="bg-gray-900 text-white" value="Inactivo">Inactivo</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="-mx-3 md:flex items-center justify-center mb-2">
                <div class=" px-3 py-10">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar Alumno
                    </button>
                </div>
            </div>
        </div>
    </form>
    <script>
        var boton = document.getElementById('boton');
        
        function traer(){
            var dni = document.getElementById('dni').value;
            fetch(
                "https://apiperu.dev/api/dni/" +
                dni + 
                "?api_token=c4277eb1a66366589e94341f4428a725d0d15b9124b5c4b55d9a0c940fb342c8" 
            )
            .then((res) => res.json())
            .then((data) =>{
                document.getElementById("nombres").value = data.data.nombres;
                document.getElementById("apellido_paterno").value = data.data.apellido_paterno;
                document.getElementById("apellido_materno").value = data.data.apellido_materno;
            })
        }
        boton.addEventListener("click", traer);
    </script>
</x-app-layout>
