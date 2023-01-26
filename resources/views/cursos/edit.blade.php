@extends('layouts.plantilla')

@section('title', 'Edit Course')

@section('content')
    <h1>Edición del curso {{$curso->name}}</h1>
    <form action="{{route('cursos.update', $curso)}}" method="POST">
        @csrf
        @method('put')
        
        <label>
            Name:<br>
            <input type="text" name="name" value="{{ old('name', $curso->name) }}">
        </label><br>
        @error('name')
            <small>{{$message}}</small>
        @enderror
        
        <br><br>

        <label>
            Descripción:<br>
            <textarea name="descripcion">{{old('descripcion', $curso->descripcion)}}</textarea>
        </label><br>
        @error('descripcion')
            <small>{{$message}}</small>
        @enderror
        
        <br><br>

        <label>
            Categoria:<br>
            <input type="text" name="categoria" value="{{old('categoria', $curso->categoria)}}">
        </label><br>
        @error('categoria')
            <small>{{$message}}</small>
        @enderror

        <br><br>
        
        <button type="submit">Actualizar Formulario</button>
    </form>
@endsection