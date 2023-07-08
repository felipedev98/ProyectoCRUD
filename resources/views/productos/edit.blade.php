<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar producto') }}
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('productos.update', $producto) }}">
            @csrf
            @method('patch')

            <div class="grid gap-6 mb-6 md:grid-cols-2">

                <div>
                    <x-input-label for="nombre" :value="__('Nombre')" />
                    <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre', $producto->nombre)" required autofocus autocomplete="nombre" />
                </div>

                <div class="form-group">
                    <label>Formato</label> <br>
                    <select class="form-control" name="kg" required>
                        {{-- <option selected>Elige el formato</option> --}}
                        <option value="15" @if($producto->kg == 15) selected @endif>15 KG</option>
                        <option value="20" @if($producto->kg == 20) selected @endif>20 KG</option>
                        <option value="25" @if($producto->kg == 25) selected @endif>25 KG</option>
                    </select>
                    {{-- <small class="form-text text-muted">Your tournament size</small> --}}
                </div>

                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="Notas">Descripción</label>
                        <textarea name="descripcion" rows="4" cols="20" class="form-control border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{$producto->descripcion}}</textarea>
                    </div>
                </div>

            </div>

            <x-input-error :messages="$errors->get('message')" class="mt-2" />

            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Guardar cambios') }}</x-primary-button>

                <a href="{{ route('productos.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 
                    rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none 
                    focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150" >Volver
                </a>
            </div>
        </form>
    </div>
</x-app-layout>