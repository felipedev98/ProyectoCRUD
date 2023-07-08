<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Creación de Bodega') }}
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('bodegas.store') }}">
            @csrf

            <div class="grid gap-6 mb-6">
                
                <h1 class="font-extrabold text-2xl">Complete todos los campos</h1>
            </div>
            
            <div class="grid gap-6 mb-6 md:grid-cols-2 mb-2">

                <div>
                    <x-input-label for="nombre" :value="__('Nombre')" />
                    <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" />
                </div>

                <div>
                    <x-input-label for="direccion" :value="__('Dirección')" />
                    <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')" required autocomplete="direccion" />
                </div>

                <div class="">
                    <div class="form-group">
                        <label for="descripcion" class="block font-medium text-sm text-gray-700">Descripción</label>
                        <textarea id="descripcion" name="descripcion" rows="4" cols="20" class="form-control border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" ></textarea>
                    </div>
                </div>


            </div>



            <div class="space-x-2">

                {{-- <x-input-error :messages="$errors->get('message')" /> --}}
                <x-primary-button>{{ __('Crear') }}</x-primary-button>
        
                <a href="{{ route('bodegas.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 
                    rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none 
                    focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150" >Volver
                </a>

            </div>



        </form>

        {{-- <a href="{{ route('bodegas.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 
        rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none 
        focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150" >Volver</a> --}}



    </div>


</x-app-layout>