@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h2>Libros</h2>

    <a href="{{ route('libros.create') }}"
       class="btn btn-primary">
        Nuevo Libro
    </a>
</div>

<table class="table table-bordered">

    <thead>
        <tr>
            <th>Portada</th>
            <th>Título</th>
            <th>Autor</th>
            <th width="220">Acciones</th>
        </tr>
    </thead>

    <tbody>

    @foreach($libros as $libro)

        <tr>

            <td>
                @if($libro->portada)
                    <img
                        src="{{ asset('storage/'.$libro->portada) }}"
                        width="80">
                @endif
            </td>

            <td>{{ $libro->titulo }}</td>

            <td>{{ $libro->autor->nombre }}</td>

            <td>

                <a href="{{ route('libros.show',$libro) }}"
                   class="btn btn-info btn-sm">
                    Ver
                </a>

                <a href="{{ route('libros.edit',$libro) }}"
                   class="btn btn-warning btn-sm">
                    Editar
                </a>

                <form action="{{ route('libros.destroy',$libro) }}"
                      method="POST"
                      class="d-inline">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm">
                        Eliminar
                    </button>

                </form>

            </td>

        </tr>

    @endforeach

    </tbody>

</table>

@endsection