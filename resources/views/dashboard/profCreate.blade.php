<?php
$fechaMaxima = date('Y-m-d', strtotime('-18 years'));
?>
<x-app-layout>
    <div class="">
        <form method="POST" action="{{ route('profesores.store') }}"
            class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md text-black">
            @csrf

            <div class="shadow-md text-black rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
                <div class="-mx-3 md:flex mb-2">

                    <input type="hidden" name="user_id" value="{{ $user->id }}"
                        class="appearance-none block w-full border rounded py-3 px-4 mb-3">

                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-state">
                            Nombre
                            de
                            Usuario:
                        </label>
                        <p
                            class="text-gray-800 dark:text-gray-300 appearance-none block w-full border rounded py-3 px-4 mb-3">
                            {{ $user->name }}</p>

                    </div>
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-state">
                            Correo
                            Electrónico:
                        </label>
                        <p
                            class="text-gray-800 dark:text-gray-300 appearance-none block w-full border rounded py-3 px-4 mb-3">
                            {{ $user->email }}</p>
                    </div>
                </div>
            </div>

            <div class="shadow-md rounded px-8 text-black pt-6 pb-8 mb-4 flex flex-col my-2">
                <div class="-mx-3 md:flex mb-6">
                    <!-- DNI -->
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-first-name">
                            DNI
                        </label>
                        <input class="appearance-none block w-full  bg-transparent border rounded py-3 px-4 mb-3"
                            type="text" placeholder="78945612" id="dni" name="dni" maxlength="8" pattern="\d{8}" title="Ingresa 8 dígitos" inputmode="numeric" required>
                    </div>
                    <!-- Nombres -->
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide   text-xs font-bold mb-2" for="grid-last-name">
                            Nombres
                        </label>
                        <input class="appearance-none block w-full bg-transparent border rounded py-3 px-4"
                            id="nombres" name="nombres" type="text" required readonly>
                    </div>
                </div>

                <div class="-mx-3 md:flex mb-6">
                    <!-- Apellido Paterno -->
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-first-name">
                            Apellido Paterno
                        </label>
                        <input class="appearance-none block w-full bg-transparent border rounded py-3 px-4 mb-3"
                            id="apellido_paterno" name="apellido_paterno" type="text" required readonly>
                    </div>

                    <!-- Apellido Materno -->
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-last-name">
                            Apellido Materno
                        </label>
                        <input class="appearance-none block w-full bg-transparent border rounded py-3 px-4"
                            id="apellido_materno" name="apellido_materno" type="text" readonly>
                    </div>
                    <div class=" px-3 py-7 -mx-3 md:flex items-center justify-center mb-2">
                    <button id="boton" type="button"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Validar profesor
                    </button>
                </div>
                </div>

                <div class="-mx-3 md:flex mb-2">

                    <!-- Fecha de Nacimiento -->
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-city">
                            Fecha de Nacimiento
                        </label>
                        <input class="appearance-none block w-full bg-transparent border rounded py-3 px-4"
                            id="grid-city" type="date" id="fecha_nacimiento" name="fecha_nacimiento"
                            max="<?php echo $fechaMaxima; ?>" required>
                    </div>

                    <!-- Género -->
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-state">
                            Género
                        </label>
                        <div class="relative">
                            <select class="block appearance-none w-full bg-transparent border  py-3 px-4 pr-8 rounded"
                                id="genero" name="genero" required>
                                <option class="bg-gray-900 text-white"value="Masculino">Masculino</option>
                                <option class="bg-gray-900 text-white" value="Femenino">Femenino</option>
                            </select>
                        </div>
                    </div>

                    <!-- Ciudad -->
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-zip">
                            Ciudad
                        </label>
                        <input class="appearance-none block w-full  bg-transparent  border  rounded py-3 px-4"
                            id="grid-zip" type="text" id="ciudad" name="ciudad" required>
                    </div>

                </div>

                <div class="-mx-3 md:flex mb-6">
                    <!-- email -->
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="email">
                            Correo Electronico
                        </label>
                        <input type="text" name="email" value="{{ $user->email }}" class="text-gray-800 dark:text-gray-300 appearance-none block w-full border rounded py-3 px-4 mb-3" readonly/>
                    </div>
                    <!-- Telefono -->
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide   text-xs font-bold mb-2" for="grid-last-name">
                            Telefono
                        </label>
                        <input class="appearance-none block w-full bg-transparent border rounded py-3 px-4" id="telefono" name="telefono" type="text" pattern="[0-9]{9}" maxlength="9" placeholder="963258741" required />
                    </div>
                </div>

                <div class="-mx-3 md:flex mb-2">
                    <!-- Dirección -->
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-city">
                            Dirección
                        </label>
                        <input class="appearance-none block w-full bg-transparent border rounded py-3 px-4"
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
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar
                            Profesor
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
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
