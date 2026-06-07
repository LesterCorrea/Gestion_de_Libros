@extends('layouts.app')

@section('content')

<h2>Detalle del Autor</h2>

<div class="card">
    <div class="card-body">

        <p>
            <strong>Nombre:</strong>
            {{ $autor->nombre }}
        </p>

        <p>
            <strong>Nacionalidad:</strong>
            {{ $autor->nacionalidad }}
        </p>

    </div>
</div>

@endsection