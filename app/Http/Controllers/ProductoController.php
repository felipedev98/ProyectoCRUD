<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use App\Models\Producto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

use Illuminate\View\View;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View

    {
        return view('productos.index', [
            'productos' => Producto::all(),
            'bodegas' => Bodega::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $producto = Producto::all();
        $bodegas = Bodega::all();
        $tipos = ['Pino', 'Lenga'];

        return view('productos.create', compact('bodegas', 'producto', 'tipos'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string|max:100',
            'kg' => 'required|in:15,20,25',
            'tipo' => 'required|in:Pino,Lenga',
            'cantidad' => 'required|integer|min:1',
            'bodega_id' => 'required|exists:bodegas,id',
        ], [
            'cantidad.min' => 'La cantidad debe ser un número mayor o igual a uno.',
            'bodega_id.required' => 'Debes seleccionar una bodega.',
            'tipo.in' => 'Debes seleccionar un tipo.',
            'kg.in' => 'Debes seleccionar un formato.',
        ]);

 
        $request->user()->productos()->create($validated); 


        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto): View
    {
        return view('productos.show', [
            'producto' => $producto,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $bodegas = Bodega::all(); // Obtenemos todas las bodegas disponibles
        $tipos = ['Pino', 'Lenga'];
        $cantidad = $producto->cantidad;

        return view('productos.edit', compact('producto', 'bodegas', 'tipos', 'cantidad')); //Pasamos las variables a la vista utilizando el metodo compact
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'kg' => 'required',
            'tipo' => 'required',
            'descripcion' => 'required',
            'cantidad' => 'required|integer|min:1',
            'bodega_id' => 'required|exists:bodegas,id',
        ], [
            'cantidad.min' => 'La cantidad debe ser un número mayor o igual a uno.',
        ]);

        $producto = Producto::findOrFail($id);//Metodo para buscar el modelo por su ID, en este contexto se utiliza para encontrar el producto especifico a actualizar.
        $producto->bodega_id = $request->input('bodega_id');
        $producto->nombre = $request->input('nombre');
        $producto->kg = $request->input('kg');
        $producto->tipo = $request->input('tipo');
        $producto->descripcion = $request->input('descripcion');
        $producto->cantidad = $request->input('cantidad');
        
        // Guardar otros cambios en los campos del producto si es necesario
        
        $producto->save();

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto): RedirectResponse
    {
        // $this->authorize('delete', $producto);
 
        $producto->delete();
    
        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }
}


