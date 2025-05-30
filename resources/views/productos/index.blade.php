@extends('layouts.app')

@section('contenido')
{{-- Formulario de nuevo producto --}}
    <div class="table bg-gray-800 p-6 rounded-lg shadow space-y-4 mb-8 text-white">
        <h2 class="text-lg font-semibold">Crear nuevo producto</h2>
        <form action="#" method="POST" class="grid grid-cols-1 md:grid-cols-6 gap-6 items-end">
            {{-- Nombre del producto --}}
            <div class="col-span-2">
                <label for="nombre" class="block text-sm font-medium text-gray-200">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="w-full bg-gray-700 border border-gray-600 rounded px-3 py-2 text-white placeholder-gray-400" placeholder="Ej: Coca Cola">
            </div>

            {{-- Precio BS --}}
            <div>
                <label for="precio_bs" class="block text-sm font-medium text-gray-200">Precio BS</label>
                <input type="text" id="precio_bs" name="precio_bs" class="w-full bg-gray-700 border border-gray-600 rounded px-3 py-2 text-white placeholder-gray-400" placeholder="Ej: 20.00">
            </div>

            {{-- Usuario --}}
            <div>
                <label for="usuario" class="block text-sm font-medium text-gray-200">Usuario</label>
                <select id="usuario" name="usuario" class="w-full bg-gray-700 border border-gray-600 rounded px-3 py-2 text-white">
                    <option value="">Selecciona un usuario</option>
                    <option value="1">Usuario 1</option>
                    <option value="2">Usuario 2</option>
                </select>
            </div>

            {{-- Botón --}}
            <div>
                <button type="submit" class="mt-6 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition w-full">
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
            <div class="grid grid-cols-7 gap-8 items-center">
                <p>#</p>
                <p>nombre producto</p>
                <p>20.50</p>
                <p>50</p>
                <p>22222</p>
                <div class="col-span-2 flex items-center gap-4">
                    <a href="#" class="btn-primary-icon">
                        <i class="uil uil-pen"></i>
                    </a>
                    <button class="btn-danger-icon">
                        <i class="uil uil-trash-alt"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
