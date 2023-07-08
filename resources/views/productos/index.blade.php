<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>

    {{-- <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('bodegas.store') }}">
            @csrf

            <div class="grid gap-6 mb-6 md:grid-cols-2">
                
                <h1 class="font-extrabold text-2xl">Agregar Bodega</h1>
            </div>
            
            <div class="grid gap-6 mb-6 md:grid-cols-2">

                <div class="mb-4">
                    <x-input-label for="nombre" :value="__('Nombre')" />
                    <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" />
                </div>

                <div class="mb-4">
                    <x-input-label for="direccion" :value="__('Dirección')" />
                    <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')" required autocomplete="direccion" />
                </div>
            

            </div>

            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Agregar') }}</x-primary-button>
        </form>


        <div class="grid gap-6 mb-6 mt-6 md:grid-cols-2">
            
            <h1 class="font-extrabold text-2xl">Bodegas Agregadas</h1>
        </div>


        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">


            @if ($bodegas->count())

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-40">

                    <thead class="text-xs text-gray-700 uppercase bg-gray-10 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nombre
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Dirección
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acciones
                            </th>



                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($bodegas as $bodega)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $bodega->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $bodega->nombre }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $bodega->direccion }}
                                </td>

                                <td>
                                    <x-dropdown>
                                        <x-slot name="trigger">
                                            <button>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                </svg>
                                            </button>
                                        </x-slot>
                                        <x-slot name="content">
                                            <x-dropdown-link :href="route('bodegas.edit', $bodega)">
                                                {{ __('Editar') }}
                                            </x-dropdown-link>

                                            <form method="POST" action="{{ route('bodegas.destroy', $bodega) }}">
                                                @csrf
                                                @method('delete')
                                                <x-dropdown-link :href="route('bodegas.destroy', $bodega)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                    {{ __('Eliminar') }}
                                                </x-dropdown-link>
                                            </form>

                                        </x-slot>
                                    </x-dropdown>
                                </td>



                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @else
                <div class="px-6 py-3">
                    No existen bodegas.
                </div>

            @endif

        </div>
    </div> --}}

    {{-- PRUEBA --}}
    {{-- PRUEBA --}}
    {{-- PRUEBA --}}
    


    <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
    


        {{-- <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">


            @if ($productos->count())

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-40 ">

                    <thead class="text-xs text-gray-700 uppercase bg-gray-10 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nombre
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Descripción
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Formato
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acciones
                            </th>

                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($productos as $producto)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">

                                <td class="px-6 py-3">
                                    {{ $producto->nombre }}
                                </td>

                                <td class="px-6 py-3">
                                    {{ $producto->descripcion }}
                                </td>

                                <td class="px-6 py-3">
                                    {{ $producto->kg }} KG
                                </td>

                    
                                <td class="">

                                    <a href="{{ route('productos.show', $producto) }}" class="mr-2 font-bold text-white py-2 px-4 rounded bg-blue-600 hover:bg-blue-500"> <i class="fa-regular fa-eye"></i> </a>

                                    <a href="{{ route('productos.edit', $producto) }}" class="mr-2 font-bold text-white py-2 px-4 rounded bg-green-600 hover:bg-green-500"> <i class="fa-solid fa-pen-to-square"></i> </a>

                                    <form method="POST" action="{{ route('productos.destroy', $producto) }}" class="mt-6">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('productos.destroy', $producto) }}" onclick="event.preventDefault(); this.closest('form').submit();" class="font-bold text-white py-2 px-4 rounded bg-red-600 hover:bg-red-500"> <i class="fa-solid fa-trash"></i> </a>
                                    </form>

                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @else
                <div class="px-6 py-3">
                    No existen productos.
                </div>
            @endif

        </div> --}}

        @if ($bodegas->count())

            <div class="grid gap-6 mb-6 mt-6 md:grid-cols-2">
                
                <h1 class="font-extrabold text-2xl">Productos existentes <i class="fa-solid fa-clipboard-list"></i></h1>

                <div class="justify-self-end">

                    <a href="{{ route('productos.create') }}" class="px-4 py-2 bg-gray-800 border border-transparent rounded-md 
                    font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none 
                    focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Agregar Producto</a>

                </div>

            </div>

            <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">


                @if ($productos->count())

                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-40 ">

                        <thead class="text-xs text-gray-700 uppercase bg-gray-10 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nombre
                                </th>

                                <th scope="col" class="px-6 py-3">
                                    Descripción
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Formato
                                </th>

                                <th scope="col" class="px-6 py-3">
                                    Bodega Asociada
                                </th>
                                
                                <th scope="col" class="px-6 py-3">
                                    Acciones
                                </th>

                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($productos as $producto)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <td class="px-6 py-3">
                                        {{ $producto->nombre }}
                                    </td>
                                    <td class="px-6 py-3">
                                        {{ $producto->descripcion }}
                                    </td>
                                    <td class="px-6 py-3">
                                        {{ $producto->kg }} KG
                                    </td>
                                    <td class="px-6 py-3">
                                        {{ $producto->bodega->nombre }}
                                    </td>

                                    <td class="">

                                        <a href="{{ route('productos.show', $producto) }}" class="mr-2 font-bold text-white py-2 px-4 rounded bg-blue-600 hover:bg-blue-500"> <i class="fa-regular fa-eye"></i> </a>
                                        <a href="{{ route('productos.edit', $producto) }}" class="mr-2 font-bold text-white py-2 px-4 rounded bg-green-600 hover:bg-green-500"> <i class="fa-solid fa-pen-to-square"></i> </a>

                                        <form method="POST" action="{{ route('productos.destroy', $producto) }}" class="mt-6">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('productos.destroy', $producto) }}" onclick="event.preventDefault(); this.closest('form').submit();" 
                                            class="font-bold text-white py-2 px-4 rounded bg-red-600 hover:bg-red-500"> <i class="fa-solid fa-trash"></i> </a>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="px-6 py-3">
                        No existen productos.
                    </div>
                @endif

            </div>

        @else
        <div class="px-6 py-3">

            <h1 class="font-extrabold text-2xl">Aún no has creado bodegas.</h1> <br>

            <p>Debes crear una bodega para comenzar a agregar productos.</p> <br>

            <a href="{{ route('bodegas.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent 
            rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 
            focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" >Crear bodega
        </a>
        </div>
        @endif
        


        {{-- <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">


            @if ($productos->count())

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-40 ">

                    <thead class="text-xs text-gray-700 uppercase bg-gray-10 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nombre
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Descripción
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Formato
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acciones
                            </th>

                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($productos as $producto)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">

                                <td class="px-6 py-3">
                                    {{ $producto->nombre }}
                                </td>

                                <td class="px-6 py-3">
                                    {{ $producto->descripcion }}
                                </td>

                                <td class="px-6 py-3">
                                    {{ $producto->kg }} KG
                                </td>

                    
                                <td class="">

                                    <a href="{{ route('productos.show', $producto) }}" class="mr-2 font-bold text-white py-2 px-4 rounded bg-blue-600 hover:bg-blue-500"> <i class="fa-regular fa-eye"></i> </a>

                                    <a href="{{ route('productos.edit', $producto) }}" class="mr-2 font-bold text-white py-2 px-4 rounded bg-green-600 hover:bg-green-500"> <i class="fa-solid fa-pen-to-square"></i> </a>

                                    <form method="POST" action="{{ route('productos.destroy', $producto) }}" class="mt-6">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('productos.destroy', $producto) }}" onclick="event.preventDefault(); this.closest('form').submit();" class="font-bold text-white py-2 px-4 rounded bg-red-600 hover:bg-red-500"> <i class="fa-solid fa-trash"></i> </a>
                                    </form>

                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @else
                <div class="px-6 py-3">
                    No existen productos.
                </div>
            @endif

        </div> --}}
    </div>
    
</x-app-layout>