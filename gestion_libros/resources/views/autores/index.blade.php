@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h2>Autores</h2>

    <a href="{{ route('autores.create') }}" class="btn btn-primary">
        Nuevo Autor
    </a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Nacionalidad</th>
            <th width="220">Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($autores as $autor)
        <tr>
            <td>{{ $autor->id }}</td>
            <td>{{ $autor->nombre }}</td>
            <td>{{ $autor->nacionalidad }}</td>

            <td>
                <a href="{{ route('autores.show',$autor) }}"
                   class="btn btn-info btn-sm">
                    Ver
                </a>

                <a href="{{ route('autores.edit',$autor) }}"
                   class="btn btn-warning btn-sm">
                    Editar
                </a>

                <form action="{{ route('autores.destroy',$autor) }}"
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