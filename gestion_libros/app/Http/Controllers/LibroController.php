<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::with('autor')->get();

        return view('libros.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $autores = Autor::all();

        return view('libros.create', compact('autores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'resumen' => 'required',
            'autor_id' => 'required|exists:autores,id',
            'portada' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $ruta = null;

        if ($request->hasFile('portada')) {
            $ruta = $request->file('portada')->store('portadas', 'public');
        }

        Libro::create([
            'titulo' => $request->titulo,
            'resumen' => $request->resumen,
            'autor_id' => $request->autor_id,
            'portada' => $ruta,
        ]);

        return redirect()
            ->route('libros.index')
            ->with('success', 'Libro registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Libro $libro)
    {
        return view('libros.show', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        $autores = Autor::all();

        return view('libros.edit', compact('libro', 'autores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libro $libro)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'resumen' => 'required',
            'autor_id' => 'required|exists:autores,id',
            'portada' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('portada')) {

            if ($libro->portada && Storage::disk('public')->exists($libro->portada)) {
                Storage::disk('public')->delete($libro->portada);
            }

            $ruta = $request->file('portada')->store('portadas', 'public');

            $libro->portada = $ruta;
        }

        $libro->titulo = $request->titulo;
        $libro->resumen = $request->resumen;
        $libro->autor_id = $request->autor_id;

        $libro->save();

        return redirect()
            ->route('libros.index')
            ->with('success', 'Libro actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libro $libro)
    {
        if ($libro->portada &&
            Storage::disk('public')->exists($libro->portada)) {

            Storage::disk('public')->delete($libro->portada);
        }

        $libro->delete();

        return redirect()
            ->route('libros.index')
            ->with('success', 'Libro eliminado correctamente.');
    }
}