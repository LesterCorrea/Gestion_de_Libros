@extends('layouts.app')

@section('content')

<h2>Registrar Libro</h2>

<form
    action="{{ route('libros.store') }}"
    method="POST"
    enctype="multipart/form-data">

    @csrf

    <div class="mb-3">
        <label>Título</label>
        <input
            type="text"
            name="titulo"
            class="form-control"
            required>
    </div>

    <div class="mb-3">
        <label>Resumen</label>
        <textarea
            name="resumen"
            class="form-control"
            rows="5"
            required></textarea>
    </div>

    <div class="mb-3">
        <label>Autor</label>

        <select name="autor_id" class="form-select">

            @foreach($autores as $autor)

                <option value="{{ $autor->id }}">
                    {{ $autor->nombre }}
                </option>

            @endforeach

        </select>
    </div>

    <div class="mb-3">
        <label>Portada</label>

        <input
            type="file"
            name="portada"
            class="form-control"
            required>
    </div>

    <button class="btn btn-success">
        Guardar
    </button>

</form>

@endsection