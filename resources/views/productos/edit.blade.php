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

            <div class="grid gap-6 mb-6">
                
                <h1 class="font-extrabold text-2xl">Complete todos los campos</h1>
            </div>

            <div class="grid gap-6 mb-6 md:grid-cols-1">

                <div>
                    <x-input-label for="nombre" :value="__('Nombre')" />
                    <x-text-input id="nombre" class="block mt-1" type="text" name="nombre" :value="old('nombre', $producto->nombre)" required autofocus autocomplete="nombre" />
                </div>

                <div class="form-group">
                    <label for="tipo">Tipo:</label> <br>
                    <select name="tipo" id="tipo" class="form-control">
                        @foreach ($tipos as $tipo)
                            <option value="{{ $tipo }}" {{ $tipo == $producto->tipo ? 'selected' : '' }}>
                                {{ $tipo }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Formato</label> <br>
                    <select class="form-control" name="kg" required>
                        <option value="15" @if($producto->kg == 15) selected @endif>15 KG</option>
                        <option value="20" @if($producto->kg == 20) selected @endif>20 KG</option>
                        <option value="25" @if($producto->kg == 25) selected @endif>25 KG</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="cantidad">Cantidad:</label> <br>
                    <input type="number" name="cantidad" id="cantidad" class="form-control" value="{{$cantidad}}"> <br>
                    @error('cantidad')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="bodega_id">Bodega asociada:</label> <br>
                    <select name="bodega_id" id="bodega_id" class="form-control">
                        @foreach ($bodegas as $bodega)
                            <option value="{{ $bodega->id }}" {{ $bodega->id == $producto->bodega_id ? 'selected' : '' }}>
                                {{ $bodega->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <div class="form-group">
                        <label for="descripcion" class="block font-medium text-sm text-gray-700">Descripción</label>
                        <textarea name="descripcion" rows="4" cols="20" class="form-control border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" >{{$bodega->descripcion}}</textarea>
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