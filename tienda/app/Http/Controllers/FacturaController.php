<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('facturas.index', [
            'facturas' => Factura::where('user_id', Auth::id())->get(), //para que solo salgan las facturas del usuario
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar solo el campo numero
        $validated = $request->validate([
            'numero' => 'required|unique:facturas,numero', // Validación del número de la factura
        ]);

        $validated['user_id'] = Auth::id();
        $factura = Factura::create($validated);
        session()->flash('exito', 'Factura creada correctamente');
        return redirect()->route('facturas.show', $factura);
    }

    /**
     * Display the specified resource.
     */
    public function show(Factura $factura)
    {
        $articulos = Articulo::all();
        return view('facturas.show', [
            'factura'  => $factura,
            'articulos' => $articulos
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Factura $factura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Factura $factura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Factura $factura)
    {
        $factura->delete();
        return redirect()->route('facturas.index');
    }

}
