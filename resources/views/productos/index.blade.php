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
        <h2 class="text-lg font-semibold mb-4">Crear nuevo producto</h2>
        <form action="{{ route('productos.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
            @csrf
            {{-- Nombre del producto --}}
            <div class="md:col-span-4">
                <label for="nombre" class="block text-sm font-medium text-gray-200">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="w-full bg-gray-700 border border-gray-600 rounded px-3 py-2 text-white placeholder-gray-400" placeholder="Ej: Coca Cola">
            </div>

            {{-- Precio BS --}}
            <div class="md:col-span-2">
                <label for="precio_bs" class="block text-sm font-medium text-gray-200">Precio BS</label>
                <input type="text" id="precio_bs" name="precio_bs" class="w-full bg-gray-700 border border-gray-600 rounded px-3 py-2 text-white placeholder-gray-400" placeholder="Ej: 20.00">
            </div>

            {{-- Usuario --}}
            <div class="md:col-span-5">
                <label for="usuario" class="block text-sm font-medium text-gray-200">Usuario</label>
                <select id="usuario" name="user_id" class="w-full bg-gray-700 border border-gray-600 rounded px-3 py-2 text-white">
                    <option value="">Selecciona un usuario</option>
                    @forelse ($usuarios as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                    @empty
                        <option disabled>No hay usuarios disponibles</option>
                    @endforelse
                </select>
            </div>

            {{-- Botón --}}
            <div class="md:col-span-1">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition w-full">
                    Crear
                </button>
            </div>
        </form>
    </div>



    <div class="table space-y-4">
        {{-- Header --}}
        <div class="grid grid-cols-7 gap-8 font-semibold">
            <h4>ID</h4>
            <h4>Nombre</h4>
            <h4>Precio BS</h4>
            <h4>Precio USD</h4>
            <h4>Tasa de Cambio</h4>
            <h4 class="col-span-2">Acciones</h4>
        </div>

        {{-- Data rows --}}
        <div class="space-y-6">
            @forelse ($productos as $producto)
                <div class="grid grid-cols-7 gap-8 items-center">
                    <p>{{ $producto->id }}</p>
                    <p>{{ $producto->nombre }}</p>
                    <p>{{ $producto->precio_bs }}</p>
                    <p>{{ $producto->precio_usd }}</p>
                    <p>{{ $producto->tasa_cambio }}</p>
                    <div class="col-span-2 flex items-center gap-4">
                        <a href="#" class="btn-primary-icon">
                            <i class="uil uil-pen"></i>
                        </a>
                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-danger-icon">
                            <i class="uil uil-trash-alt"></i>
                        </button>
                    </form>
                    </div>
                </div>
            @empty
                <div class="text-gray-400">No hay productos registrados.</div>
            @endforelse
        </div>

    </div>
@endsection
