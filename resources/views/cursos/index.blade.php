@extends('layouts.plantilla')

@section('title', 'Cursos')

@section('content')
    
    <h1>Sección de Cursos</h1>
    
    <p><a href="{{route('cursos.create')}}">Crear Curso </a></p>

    <p>
        <ul>

            @foreach ($cursos as $curso)
                <li>
                    <a href="{{route('cursos.show', $curso)}}">{{$curso->id . ' - ' . $curso->name}}</a>
                    <br>
                </li>    
            @endforeach
            
        </ul>
    </p>

    {{$cursos->links();}}

@endsection