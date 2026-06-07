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
        $autores = Autor::all();

        return view('autores.index', compact('autores'));
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
        $request->validate([
            'nombre' => 'required|max:255',
            'nacionalidad' => 'required|max:255',
        ]);

        Autor::create($request->all());

        return redirect()
            ->route('autores.index')
            ->with('success', 'Autor registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Autor $autor)
    {
        return view('autores.show', compact('autor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Autor $autor)
    {
        return view('autores.edit', compact('autor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Autor $autor)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'nacionalidad' => 'required|max:255',
        ]);

        $autor->update($request->all());

        return redirect()
            ->route('autores.index')
            ->with('success', 'Autor actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Autor $autor)
    {
        $autor->delete();

        return redirect()
            ->route('autores.index')
            ->with('success', 'Autor eliminado correctamente.');
    }
}