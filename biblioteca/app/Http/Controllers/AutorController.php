<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('autores.index', [
            'autores' => Autor::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('autores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo' => 'required|unique:autores,codigo',
            'nombre' => 'required|string|max:255',
        ]);
        $autor = Autor::create($validated);
        session()->flash('exito', 'autor creado correctamente.');
        return redirect()->route('autores.show', $autor);
    }

    /**
     * Display the specified resource.
     */
    public function show(Autor $autor)
    {
        return view('autores.show', [
            'autor' => $autor
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Autor $autor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Autor $autor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Autor $autor)
    {
        $autor->delete();
        return redirect()->route('autores.index');
    }
}
