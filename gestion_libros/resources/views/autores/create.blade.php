@extends('layouts.app')

@section('content')

<h2>Registrar Autor</h2>

<form action="{{ route('autores.store') }}" method="POST">

    @csrf

    <div class="mb-3">
        <label>Nombre</label>
        <input
            type="text"
            name="nombre"
            class="form-control"
            required>
    </div>

    <div class="mb-3">
        <label>Nacionalidad</label>
        <input
            type="text"
            name="nacionalidad"
            class="form-control"
            required>
    </div>

    <button class="btn btn-success">
        Guardar
    </button>

</form>

@endsection