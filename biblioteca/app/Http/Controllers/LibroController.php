<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Ejemplar;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //public function index()
//{
// Obtener los libros ordenados de forma descendente por ID
   // $libros = Libro::orderBy('id', 'desc')->get();

    // Pasar los libros ordenados a la vista
    //return view('libros.index', [
    //    'libros' => $libros
    //]);
//}

    public function index()
    {
        return view('libros.index', [
            'libros' => Libro::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('libros.create',
            ['autores' => Autor::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo' => 'required|max:6|unique:libros,codigo',
            'titulo' => 'required|string|max:255',
            'autor_id' => 'required|exists:autores,id',
        ]);

        //dd($validated); // Inspeccionar los datos antes de crear el registro

        $libro = Libro::create($validated);
        session()->flash('exito', 'Libro creado correctamente.');
        return redirect()->route('libros.show', $libro);
    }


    /**
     * Display the specified resource.
     */
    public function show(Libro $libro)
    {
        $ejemplares = $libro->ejemplares;

        return view('libros.show', [
            'libro' => $libro,
            'ejemplares' => $ejemplares,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        return view('libros.edit', [
            'libro'  => $libro,
            'autores' => Autor::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libro $libro)
    {
        $validated = $request->validate([
            'codigo' => [
                'required',
                'max:2',
                Rule::unique('libros')->ignore($libro->id),
            ],
            'titulo' => 'required|string|max:255',
            'autor_id' => 'required|exists:autores,id',
        ]);
        $libro->fill($validated);
        $libro->save();
        session()->flash('exito', 'libro modificado correctamente.');
        return redirect()->route('libros.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();
        return redirect()->route('libros.index');
    }
}
