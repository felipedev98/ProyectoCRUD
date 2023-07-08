<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bodegas') }}
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
    
        <div class="grid gap-6 mb-6 mt-6 md:grid-cols-2">
            
            <h1 class="font-extrabold text-2xl">Bodegas existentes<i class="fa-solid fa-warehouse ml-2"></i></h1>

            <div class="justify-self-end">

                <a href="{{ route('bodegas.create') }}" class="px-4 py-2 bg-gray-800 border border-transparent rounded-md 
                font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none 
                focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Crear bodega</a>

            </div>

        </div>


        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">


            @if ($bodegas->count())

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-40 ">

                    <thead class="text-xs text-gray-700 uppercase bg-gray-10 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            {{-- <th scope="col" class="px-6 py-3">
                                ID
                            </th> --}}
                            <th scope="col" class="px-6 py-3">
                                Nombre
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Dirección
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Descripción
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acciones
                            </th>

                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($bodegas as $bodega)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">

                                {{-- <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    {{ $bodega->id }}
                                </th> --}}
                                <td class="px-6 py-3">
                                    {{ $bodega->nombre }}
                                </td>
                                <td class="px-6 py-3">
                                    {{ $bodega->direccion }}
                                </td>
                                <td class="px-6 py-3">
                                    {{ $bodega->descripcion }}
                                </td>

                                <td class="">

                                    <a href="{{ route('bodegas.show', $bodega) }}" class="mr-2 font-bold text-white py-2 px-4 rounded bg-blue-600 hover:bg-blue-500"> <i class="fa-regular fa-eye"></i> </a>

                                    <a href="{{ route('bodegas.edit', $bodega) }}" class="mr-2 font-bold text-white py-2 px-4 rounded bg-green-600 hover:bg-green-500"> <i class="fa-solid fa-pen-to-square"></i> </a>

                                    <form method="POST" action="{{ route('bodegas.destroy', $bodega) }}" class="mt-6">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('bodegas.destroy', $bodega) }}" onclick="event.preventDefault(); this.closest('form').submit();" class="font-bold text-white py-2 px-4 rounded bg-red-600 hover:bg-red-500"> <i class="fa-solid fa-trash"></i> </a>
                                    </form>


                                    {{-- <x-dropdown>
                                        <x-slot name="trigger">
                                            <button>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                </svg>
                                            </button>
                                        </x-slot>
                                        <x-slot name="content">

                                            <x-dropdown-link :href="route('bodegas.show', $bodega)">
                                                {{ __('Mostrar') }}
                                            </x-dropdown-link>

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
                                    </x-dropdown> --}}
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
    </div>
    
</x-app-layout>