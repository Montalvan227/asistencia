<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Registro de Asistencia') }}
        </h2>
    </x-slot>
    <div class="mt-10 flex items-center justify-center px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            <div>
                <h2 class=" text-center text-3xl font-extrabold text-gray-900 dark:text-white">
                    Registra la Asistencia
                </h2>
            </div>
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 my-4">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 my-4">
                    {{ session('error') }}
                </div>
            @endif

            <form class="mt-8 space-y-6" method="POST" action="{{ route('asistencia.store') }}">
                @csrf

                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="dni" class="sr-only">DNI del Alumno</label>
                        <div class="flex items-center">
                            <button type="button" id="btnStart" class="bg-white border-gray-300 p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mic" viewBox="0 0 16 16">
                                    <path d="M3.5 6.5A.5.5 0 0 1 4 7v1a4 4 0 0 0 8 0V7a.5.5 0 0 1 1 0v1a5 5 0 0 1-4.5 4.975V15h3a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1h3v-2.025A5 5 0 0 1 3 8V7a.5.5 0 0 1 .5-.5"/>
                                    <path d="M10 8a2 2 0 1 1-4 0V3a2 2 0 1 1 4 0zM8 0a3 3 0 0 0-3 3v5a3 3 0 0 0 6 0V3a3 3 0 0 0-3-3"/>
                                </svg>
                            </button>
                            <input id="dni" name="dni" type="text" autocomplete="dni" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                        </div>
                        <p class="text-sm text-gray-500 mt-2">Por favor, ingresa solo el número de DNI en este campo.</p>
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-2 px-4
                        border border-transparent text-sm font-medium rounded-md text-white
                        bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2
                        focus:ring-offset-2 focus:ring-indigo-500">
                        Registrar Asistencia
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
<script>
    const inputDNI = document.getElementById('dni');

const recognition = new webkitSpeechRecognition();

recognition.lang = 'es-PE'; // Establece el idioma según tus necesidades
recognition.interimResults = false;
recognition.maxAlternatives = 1;

let digitCounter = 0; // Contador de dígitos

recognition.addEventListener('result', (event) => {
    const result = event.results[0][0].transcript;
    const numbers = result.match(/\d+/g); // Extrae solo números usando una expresión regular
    if (numbers && numbers.length > 0) {
        const concatenatedNumbers = numbers.join(""); // Combina los números sin espacios
        const numDigits = concatenatedNumbers.length;
        if (numDigits > 0) {
            // Actualiza el campo de entrada con los números
            inputDNI.value = concatenatedNumbers;

            // Actualiza el contador de dígitos
            digitCounter = numDigits;

            // Si se alcanza el límite máximo de 8 dígitos, envía el formulario
            if (digitCounter >= 8) {
                // Recorta a 8 dígitos y envía el formulario
                inputDNI.value = inputDNI.value.slice(0, 8);
                inputDNI.form.submit();
            }
        }
    }
});

recognition.addEventListener('end', () => {
    recognition.stop();
});

// Agregar un evento de entrada para actualizar el contador de dígitos
inputDNI.addEventListener('input', () => {
    digitCounter = inputDNI.value.length;

    // Si se alcanza el límite máximo de 8 dígitos, envía el formulario
    if (digitCounter >= 8) {
        // Recorta a 8 dígitos y envía el formulario
        inputDNI.value = inputDNI.value.slice(0, 8);
        inputDNI.form.submit();
    }
});

// Agregar un evento de clic para iniciar el reconocimiento de voz
document.getElementById('btnStart').addEventListener('click', () => {
    // Comprueba si el navegador admite el reconocimiento de voz
    if (webkitSpeechRecognition) {
        recognition.start();
    } else {
        alert("Tu navegador no admite el reconocimiento de voz.");
    }
});
document.getElementById("dni").disabled = false;
document.getElementById("dni").focus();
</script>