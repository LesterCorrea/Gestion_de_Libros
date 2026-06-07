@extends('layouts.app')

@section('content')

<h2>{{ $libro->titulo }}</h2>

<div class="card">

    <div class="card-body">

        @if($libro->portada)

            <img
                src="{{ asset('storage/'.$libro->portada) }}"
                width="200"
                class="mb-3">

        @endif

        <p>
            <strong>Autor:</strong>
            {{ $libro->autor->nombre }}
        </p>

        <p>
            <strong>Resumen:</strong>
            {{ $libro->resumen }}
        </p>

    </div>

</div>

@endsection