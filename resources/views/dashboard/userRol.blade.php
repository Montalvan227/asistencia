<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800  dark:text-gray-200 leading-tight ">
            {{ __('Usuarios y Roles') }}
            {{-- <span class="uppercase">{{ $role->name }}</span> --}}
        </h2>
    </x-slot>

    <h2 class="font-semibold text-xl text-gray-800  dark:text-gray-200 leading-tight">
        Nombre: <span class="uppercase">{{ $user->name }}</span>
    </h2>

    <div>
        <h5 class="dark:text-white">Lista de Roles</h5>
        {!! Form::model($user, ['route' => ['asignar.update', $user->id], 'method' => 'PUT']) !!}
        @foreach ($roles as $role)
            <!-- ... tus campos de roles ... -->
            <div>
                <label class="text-black">
                    {!! Form::checkbox(' roles[]', $role->id, $user->hasAnyRole($role->id) ?: false, [
                        'class' =>
                            'appearance-none w-9 focus:outline-none checked:bg-blue-300 h-5 bg-gray-300 rounded-full before:inline-block before:rounded-full before:bg-blue-500 before:h-4 before:w-4 checked:before:translate-x-full shadow-inner transition-all duration-300 before:ml-0.5',
                    ]) !!}
                    <span class="ml-2 text-black">{{ $role->name }}</span>
                </label>
            </div>
        @endforeach
        {!! Form::hidden('action', 'updateRoles') !!} <!-- Campo oculto para indicar que estamos actualizando roles -->
        {!! Form::submit('Asignar Roles', [
            'class' => 'mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800',
        ]) !!}
        {!! Form::close() !!}
    </div>

    <div>
        {!! Form::model($user, ['route' => ['asignar.update', $user->id], 'method' => 'PUT']) !!}
        <div class="text-black">
            <label for="password">Actualizar Contraseña:</label>
            {!! Form::password('password', [
                'class' => 'bg-transparent appearance-none block w-64 bg-transparent border rounded py-3 px-4',
                'placeholder' => 'Ingrese su contraseña',
            ]) !!}
        </div>
        {!! Form::hidden('action', 'updatePassword') !!} <!-- Campo oculto para indicar que estamos actualizando la contraseña -->
        {!! Form::submit('Actualizar Contraseña', [
            'class' => 'mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800',
        ]) !!}
        {!! Form::close() !!}
    </div>
    <x-section-border />
</x-app-layout>
