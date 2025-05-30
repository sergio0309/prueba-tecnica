@extends('layouts.app')

@section('contenido')

    {{-- Alertas de sesión --}}
    @if (session('success'))
        <div class="bg-green-600 text-white px-4 py-2 rounded shadow mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-600 text-white px-4 py-2 rounded shadow mb-4">
            {{ session('error') }}
        </div>
    @endif

    {{-- Errores de validación --}}
    @if ($errors->any())
        <div class="bg-red-700 text-white px-4 py-2 rounded shadow mb-4">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="table bg-gray-800 p-6 rounded-lg shadow space-y-4 mb-8 text-white">
        <h2 class="text-lg font-semibold">Crear nuevo Usuario</h2>
        <form action="{{ route('usuarios.store') }}" method="POST" class="grid grid-cols-12 gap-6 items-end">
            @csrf
            {{-- Nombre --}}
            <div class="col-span-12 md:col-span-3">
                <label for="name" class="block text-sm font-medium text-gray-200">Nombre</label>
                <input type="text" id="name" name="name" class="w-full bg-gray-700 border border-gray-600 rounded px-3 py-2 text-white placeholder-gray-400" placeholder="Ej: Juan Pérez">
            </div>

            {{-- Email --}}
            <div class="col-span-12 md:col-span-3">
                <label for="email" class="block text-sm font-medium text-gray-200">Email</label>
                <input type="email" id="email" name="email" class="w-full bg-gray-700 border border-gray-600 rounded px-3 py-2 text-white placeholder-gray-400" placeholder="Ej: juan@example.com">
            </div>

            {{-- Contraseña --}}
            <div class="col-span-12 md:col-span-3">
                <label for="password" class="block text-sm font-medium text-gray-200">Contraseña</label>
                <input type="password" id="password" name="password" class="w-full bg-gray-700 border border-gray-600 rounded px-3 py-2 text-white placeholder-gray-400" placeholder="Mínimo 8 caracteres">
            </div>

            {{-- Botón --}}
            <div class="col-span-12 md:col-span-3">
                <button type="submit" class="mt-6 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition w-full">
                    Crear
                </button>
            </div>
        </form>
    </div>

    <div class="table w-full space-y-4">
    {{-- Header --}}
    <div class="grid grid-cols-12 gap-4 font-semibold text-white bg-gray-700 px-4 py-2 rounded">
        <h4 class="col-span-1">ID</h4>
        <h4 class="col-span-5">Nombre</h4>
        <h4 class="col-span-4">Email</h4>
        <h4 class="col-span-2 text-center">Acciones</h4>
    </div>

    {{-- Data rows --}}
    <div class="space-y-2">
        @forelse ($usuarios as $usuario)
            <div class="grid grid-cols-12 gap-4 items-center bg-gray-800 text-white px-4 py-2 rounded">
                <p class="col-span-1">{{ $usuario->id }}</p>
                <p class="col-span-5">{{ $usuario->name }}</p>
                <p class="col-span-4">{{ $usuario->email }}</p>
                <div class="col-span-2 flex justify-center gap-4">
                    <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn-primary-icon">
                        <i class="uil uil-pen"></i>
                    </a>
                    <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-danger-icon">
                            <i class="uil uil-trash-alt"></i>
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="text-gray-400 italic text-center py-4">
                No hay usuarios registrados.
            </div>
        @endforelse
    </div>
</div>


@endsection
