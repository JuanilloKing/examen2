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
        return view('peliculas.index', [
            'peliculas' => pelicula::all()
        ]);
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
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
        ]);

        $pelicula = pelicula::create($validated);
        session()->flash('exito', 'pelicula creado correctamente.');
        return redirect()->route('peliculas.show', $pelicula);
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
        return view('peliculas.edit', [
            'pelicula'  => $pelicula,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelicula $pelicula)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
        ]);
        $pelicula->fill($validated);
        $pelicula->save();
        session()->flash('exito', 'pelicula modificado correctamente.');
        return redirect()->route('peliculas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelicula $pelicula)
    {
        if($pelicula->proyecciones()->withCount('entradas')->get()->sum('entradas_count') == 0) {
            $pelicula->delete();
        } else {
            session()->flash('fail', 'no se puede borrar.');
        }
        return redirect()->route('peliculas.index');
    }
}
