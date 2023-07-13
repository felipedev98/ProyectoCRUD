<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use App\Models\Producto; 
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\View\View;


class BodegaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View 
    {
        // return view('bodegas.index');

        return view('bodegas.index', [
            'bodegas' => Bodega::all(),
            'productos' => Producto::all(),
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Bodega $bodega): View
    {
     
        return view('bodegas.create', [
            'bodega' => $bodega,
            'productos' => Producto::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'direccion' => 'required|string|max:100',
            'descripcion' => 'required|string|max:200',
        ]);
 
        $request->user()->bodegas()->create($validated);
 
        return redirect(route('bodegas.index'));
    }

    /**
     * Display the specified resource.
     */


     public function show($id)
     {
        // Identificador unico de bodega a mostrar
        $bodega = Bodega::find($id);

        // Uso de relacion en modelo Bodega para obtener productos asociados a esa bodega
        $productos = $bodega->productos;
        // Creacion de array asociativo en funcion compact
        return view('bodegas.show', compact('bodega', 'productos'));

     }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bodega $bodega): View
    {
        // $this->authorize('update', $bodega);
 
        return view('bodegas.edit', [
            'bodega' => $bodega,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bodega $bodega): RedirectResponse
    {
        $this->authorize('update', $bodega);
 
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'direccion' => 'required|string|max:100',
            'descripcion' => 'required|string|max:200',
        ]);
 
        $bodega->update($validated);
 
        return redirect(route('bodegas.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
 

    public function destroy($id)
{
    $bodega = Bodega::find($id);
    
    // Verificar si la bodega tiene productos asociados
    if ($bodega->productos()->exists()) {
        return redirect()->back()->with('error', 'No se puede eliminar la bodega porque tiene productos en su interior.');
    }
    
    // Si la bodega no tiene productos asociados, se puede eliminar
    $bodega->delete();
    
    return redirect()->route('bodegas.index')->with('success', 'Bodega eliminada correctamente.');
}
}
