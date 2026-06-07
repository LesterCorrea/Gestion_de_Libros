@extends('layouts.app')

@section('content')

<h2>Editar Autor</h2>

<form action="{{ route('autores.update',$autor) }}" method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nombre</label>
        <input
            type="text"
            name="nombre"
            class="form-control"
            value="{{ $autor->nombre }}"
            required>
    </div>

    <div class="mb-3">
        <label>Nacionalidad</label>
        <input
            type="text"
            name="nacionalidad"
            class="form-control"
            value="{{ $autor->nacionalidad }}"
            required>
    </div>

    <button class="btn btn-primary">
        Actualizar
    </button>

</form>

@endsection