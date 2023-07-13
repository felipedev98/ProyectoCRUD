<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bodegas') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
    
        <div class="grid gap-6 mb-6 mt-6 md:grid-cols-2">
            
            <h1 class="font-extrabold text-2xl">Bodegas existentes<i class="fa-solid fa-warehouse ml-2"></i></h1>

            <div class="justify-self-end">

                <a href="{{ route('bodegas.create') }}" class="px-4 py-2 bg-gray-800 border border-transparent rounded-md 
                font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none 
                focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Crear bodega</a>

            </div>

        </div>

        @if (session('error'))
            <div id="mensaje" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div id="mensaje" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                {{ session('success') }}
            </div>
        @endif

        <script>
            // Ocultar el mensaje después de 5 segundos
            setTimeout(function() {
                document.getElementById('mensaje').style.display = 'none';
            }, 5000);
        </script>

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y grid" >


            @if ($bodegas->count())

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-40 ">

                    <thead class="text-xs text-gray-700 uppercase bg-gray-10 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
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
                                  
                                    <form method="POST" action="{{ route('bodegas.destroy', $bodega) }}" class="mt-4">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('bodegas.destroy', $bodega) }}" onclick="event.preventDefault(); this.closest('form').submit();" class="font-bold text-white py-2 px-4 rounded bg-red-600 hover:bg-red-500"> <i class="fa-solid fa-trash"></i> </a>
                                    </form>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @else
                <div class="flex items-center p-4 text-sm text-gray-800 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300">
                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <div class="text-base">
                    <span class="font-bold">No existen bodegas.</span>
                    </div>
        
        
                </div>

            @endif

        </div>
    </div>
    
</x-app-layout>