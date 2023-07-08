<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modificar Bodega') }}
        </h2>
    </x-slot>


    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('bodegas.update', $bodega) }}">
            @csrf
            @method('patch')

            <div class="grid gap-6 mb-6">
                
                <h1 class="font-extrabold text-2xl">Complete todos los campos</h1>
            </div>

            <div class="max-w-2xl grid gap-6 mb-6 md:grid-cols-2">

                <div>
                    <x-input-label for="nombre" :value="__('Nombre')" />
                    <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre', $bodega->nombre)" required autofocus autocomplete="nombre" />
                </div>

                <div>
                    <x-input-label for="direccion" :value="__('Dirección')" />
                    <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion', $bodega->direccion)" required autocomplete="nombre" />
                </div>

                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="Notas">Descripción</label>
                        <textarea name="descripcion" rows="4" cols="20" class="form-control border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{$bodega->descripcion}}</textarea>
                    </div>
                </div>

            </div>

            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Guardar cambios') }}</x-primary-button>

                <a href="{{ route('bodegas.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md 
                font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 
                focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>