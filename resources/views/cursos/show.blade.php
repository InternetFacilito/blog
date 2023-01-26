@extends('layouts.plantilla')

@section('title', 'Show Course: ' . $curso->name)

@section('content')
    
    <h1>Bienvenid@ al curso {{ $curso->name }}</h1>
    
    <p>
        <a href="{{route('cursos.index')}}">Regresar a Cursos</a><br>
        <a href="{{route('cursos.edit', $curso)}}">Editar Curso</a>
    </p>

    <P><strong>Categoría: </strong>{{ $curso->categoria }}</P>
    
    <p><strong>Descripción: </strong>{{$curso->descripcion}}</p>
    
    <form action="{{ route('cursos.destroy', $curso) }}" method="POST">
        @method('delete')
        @csrf
        <button type="submit">Eliminar Curso</button>
    </form>


@endsection
