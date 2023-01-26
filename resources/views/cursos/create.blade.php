@extends('layouts.plantilla')

@section('title', 'Create Course')

@section('content')
    <h1>Aquí va el formulario para crear un curso nuevo</h1>

    <form action="{{route('cursos.store')}}" method="POST">

        @csrf

        <label>
            Nombre:<br>
            <input type="text" name="name" value="{{old('name')}}">
        </label><br>
        @error('name')
            <small>*{{$message}}</small>
        @enderror
            
        <br><br>

        <label >
            Descripción:<br>
            <textarea name="descripcion">{{old('descripcion')}}</textarea>
        </label><br>
        @error('descripcion')
            <small>*{{$message}}</small>
        @enderror
        
        <br><br>
        
        <label >
            Categoría:<br>
            <input type="text" name="categoria" value="{{old('categoria')}}">
        </label><br>
        @error('categoria')
            <small>*{{$message}}</small>
        @enderror
        
        <br><br>

        <button type="submit">Enviar Formulario</button>
    </form>
@endsection