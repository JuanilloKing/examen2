<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('peliculas.index', ['peliculas' =>Pelicula::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peliculas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255'
        ]);
        Pelicula::create($request->all());
        return redirect()->route('peliculas.index');
    }

    /**
    * Display the specified resource.
     */
    public function show(Pelicula $pelicula)
    {
        $acc = 0;

        $entrada = $pelicula->proyecciones()->withCount('entradas')->get()->sum('entradas_count');

        foreach ($pelicula->proyecciones as $proyeccion) {
            $acc += $proyeccion->entradas->count();
        }

        return view('peliculas.show', [
            'pelicula' => $pelicula,
            'entradas' => $acc,
            'sumentradas' => $entrada
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelicula $pelicula)
    {
        return view('peliculas.edit', ['pelicula' => $pelicula]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelicula $pelicula)
    {
        $acc = 0;

        $entrada = $pelicula->proyecciones()->withCount('entradas')->get()->sum('entradas_count');

        foreach ($pelicula->proyecciones as $proyeccion) {
            $acc += $proyeccion->entradas->count();
        }
        if ($acc = 0) {
            $request->validate([
                'titulo' => 'required|string|max:255'
            ]);
            $pelicula->update($request->all());
            return redirect()->route('peliculas.index');
        }
        else {
            return redirect()->route('peliculas.index')->with('error', 'pelicula no editada');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelicula $pelicula)
    {
        $acc = 0;

        $entrada = $pelicula->proyecciones()->withCount('entradas')->get()->sum('entradas_count');

        foreach ($pelicula->proyecciones as $proyeccion) {
            $acc += $proyeccion->entradas->count();
        }
        if ($acc == 0) {
            $pelicula->delete();
            return redirect()->route('peliculas.index');
        }
        else {
            return redirect()->route('peliculas.index')->with('error', 'pelicula no borrada, ya tiene entradas asignadas');
        }
    }
}
