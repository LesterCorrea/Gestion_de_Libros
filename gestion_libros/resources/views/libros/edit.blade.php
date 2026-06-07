@extends('layouts.app')

@section('content')

<h2>Editar Libro</h2>

<form
    action="{{ route('libros.update',$libro) }}"
    method="POST"
    enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Título</label>
        <input
            type="text"
            name="titulo"
            class="form-control"
            value="{{ $libro->titulo }}">
    </div>

    <div class="mb-3">
        <label>Resumen</label>
        <textarea
            name="resumen"
            class="form-control"
            rows="5">{{ $libro->resumen }}</textarea>
    </div>

    <div class="mb-3">
        <label>Autor</label>

        <select name="autor_id" class="form-select">

            @foreach($autores as $autor)

                <option
                    value="{{ $autor->id }}"
                    {{ $autor->id == $libro->autor_id ? 'selected' : '' }}>
                    {{ $autor->nombre }}
                </option>

            @endforeach

        </select>
    </div>

    <div class="mb-3">

        @if($libro->portada)
            <img
                src="{{ asset('storage/'.$libro->portada) }}"
                width="150"
                class="mb-2">
        @endif

        <input
            type="file"
            name="portada"
            class="form-control">

    </div>

    <button class="btn btn-primary">
        Actualizar
    </button>

</form>

@endsection