<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Alumno $alumnos)
    {
        return view('alumnos.index', [
            'alumnos' => Alumno::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alumnos.create',);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        //dd($validated); // Inspeccionar los datos antes de crear el registro

        $alumno = Alumno::create($validated);
        session()->flash('exito', 'Alumno creado correctamente.');
        return redirect()->route('alumnos.show', $alumno);
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {

        return view('alumnos.show', [
            'alumno' => $alumno,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', [
            'alumno'  => $alumno,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumno $alumno)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
        ]);
        $alumno->fill($validated);
        $alumno->save();
        session()->flash('exito', 'alumno modificado correctamente.');
        return redirect()->route('alumnos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return redirect()->route('alumnos.index');
    }
}
