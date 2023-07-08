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
            // 'productos' => Producto::with('user')->latest()->get(),
            'productos' => Producto::all(),
            // 'bodegas' => Bodega::with('user')->latest()->get(),
            'bodegas' => Bodega::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create(Producto $producto): View
    // {
    //     return view('productos.create', [
    //         'producto' => $producto,
    //     ]);
    // }

    public function create(Producto $producto, Bodega $bodega): View
    {
        // $bodega = Bodega::all();

        return view('productos.create', [
            'producto' => $producto,
            // 'bodega' => $bodega,
            'bodegas' => Bodega::all(),
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string|max:100',
            'kg' => 'required',
            'bodega_id' => 'required',
            // 'bodega_nombre' => 'required',
        ]);
 
        $request->user()->productos()->create($validated); 

        return redirect(route('productos.index'));
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
    public function edit(Producto $producto): View
    {
        return view('productos.edit', [
            'producto' => $producto,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto): RedirectResponse
    {
        $this->authorize('update', $producto);
 
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'kg' => 'required',
            
        ]);
 
        $producto->update($validated);
 
        return redirect(route('productos.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto): RedirectResponse
    {
        // $this->authorize('delete', $producto);
 
        $producto->delete();
 
        return redirect(route('productos.index'));
    }
}


