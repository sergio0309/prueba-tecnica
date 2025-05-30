<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

        @vite('resources/css/app.css')
        <title>Tinda de pedidos</title>
    </head>

    <body>
        <main class="flex">
            <nav class="sidebar">
                <div class="mb-8 flex gap2">
                    <img src="" alt="">
                    <div>
                        <p class="text-gray-300">Bienvenido</p>
                        <p class="text-sm text-gray-300">admin@gmail.com</p>
                    </div>
                </div>
                <ul class="sidebar__menu">
                    <a href="/usuarios" class="{{ request()->path() == 'usuarios' ? 'sidebar__menu--item sidebar__menu--active' : 'sidebar__menu--item' }}">
                        <i class="uil uil-users-alt"></i>
                        <span>Usuarios</span>
                    </a>
                    <a href="/productos" class="{{ request()->path() == 'productos' ? 'sidebar__menu--item sidebar__menu--active' : 'sidebar__menu--item' }}">
                        <i class="uil uil-shopping-bag"></i>
                        <span>Productos</span>
                    </a>
                    <a href="/pedidos" class="{{ request()->path() == 'pedidos' ? 'sidebar__menu--item sidebar__menu--active' : 'sidebar__menu--item' }}">
                        <i class="uil uil-shopping-cart-alt"></i>
                        <span>Pedidos</span>
                    </a>
                </ul>
                <div class="flex-1"></div>

                <div class="w-full mt-8 pb-4">
                    <button type="submit" class="sidebar__menu--logout">
                        <i class="uil uil-signout"></i>
                        <span>Cerrar Sesion</span>
                    </button>
                </div>
            </nav>
            <section class="p-8 w-full overflow-y-auto h-screen">
                @yield('header')
                @yield('contenido')
            </section>
        </main>
    </body>
</html>
