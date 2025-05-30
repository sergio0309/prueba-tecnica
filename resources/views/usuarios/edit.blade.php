@extends('layouts.app')

@section('contenido')
    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST"
          class="bg-gray-800 text-white shadow-md rounded-lg p-6 max-w-md mx-auto mt-16 space-y-4">
        @csrf
        @method('PUT')

        <h2 class="text-xl font-semibold text-center">Editar Usuario</h2>

        <div class="form-control">
            <label for="name" class="block text-sm font-medium">Nombre</label>
            <input type="text" id="name" name="name" value="{{ old('name', $usuario->name) }}"
                   class="w-full px-4 py-2 mt-1 rounded border border-gray-600 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('name')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-control">
            <label for="email" class="block text-sm font-medium">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $usuario->email) }}"
                   class="w-full px-4 py-2 mt-1 rounded border border-gray-600 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('email')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
                class="w-full py-2 px-4 rounded bg-blue-600 text-white hover:bg-blue-700 transition">
            Guardar
        </button>
    </form>
@endsection
