<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight"> 
            Detalles de Bodega 
        </h2>

    </x-slot>

    <div class="max-w-5xl mx-auto p-4 sm:p-6 lg:p-8">

        <div class="grid gap-6 mb-6 mt-6">
            <h1 class="font-bold text-2xl">{{$bodega->nombre}}</h1>

            <p class="tracking-wide"><i class="fa-solid fa-location-dot mr-2"></i>{{$bodega->direccion}}</p>

            <p class="text"><i class="fa-solid fa-circle-info mr-1"></i>{{$bodega->descripcion}}</p>

            <p class=""><i class="fa-solid fa-user mr-2"></i>Bodega creada por: {{$bodega->user->name}} | {{$bodega->user->email}}</p>

        </div> <br>

        <h1 class="font-bold text-2xl">Productos asociados</h1>

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

                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($productos as $producto)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <td class="px-6 py-3">
                                {{ $producto->nombre }}
                            </td>

                        </tr>
                        @endforeach

                        {{-- @foreach ($productos->$bodega as $item)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <td class="px-6 py-3">
                                    {{ $item->producto->nombre }}
                                </td>

                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>

                @else
                <div class="px-6 py-3">
                    No existen productos asociados.
                </div>
                
            @endif

                
        </div> <br>

        <div class="space-x-2">

            {{-- <x-primary-button>{{ __('Agregar') }}</x-primary-button> --}}

            {{-- <a href="{{ route('bodegas.edit', $bodega) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent 
            rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 
            focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Editar</a> --}}

    
            <a href="{{ route('bodegas.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 
                rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none 
                focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150" >Volver
            </a>

        </div>


    </div>


</x-app-layout>