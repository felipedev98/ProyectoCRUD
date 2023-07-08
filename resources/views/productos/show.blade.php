<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight"> 
            Detalles de Producto
        </h2>

    </x-slot>

    <div class="max-w-5xl mx-auto p-4 sm:p-6 lg:p-8">

        <div class="grid gap-6 mb-6 mt-6">
            <h1 class="font-bold text-2xl">{{$producto->nombre}}</h1>
            {{-- <p class=""><i class="fa-solid fa-location-dot mr-2"></i>{{$producto->direccion}}</p>
            <p class="font-medium">{{$producto->descripcion}}</p> --}}


            <p class=""><i class="fa-solid fa-user mr-2"></i>Producto creado por: {{$producto->user->name}} | {{$producto->user->email}}</p>

            <p class="text"><i class="fa-solid fa-circle-info mr-1"></i>{{$producto->descripcion}}</p>
            <p class="text"><i class="fa-solid fa-weight-hanging mr-1"></i>Formato: {{$producto->kg}} KG</p>
            <p class="text"><i class="fa-solid fa-warehouse mr-1"></i>Bodega asociada: {{$producto->bodega->nombre}}</p>





        </div>

        <div class="space-x-2">

            <a href="{{ route('productos.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 
                rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none 
                focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150" >Volver
            </a>

        </div>


    </div>


</x-app-layout>