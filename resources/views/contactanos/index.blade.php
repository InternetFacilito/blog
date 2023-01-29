@extends('layouts.plantilla')

@section('title', 'Contáctanos')

@section('content')
    
    <h1>Dejanos un mensaje</h1>
    
    <p>
        <form action="{{route('contactanos.store')}}" method="POST">
            @csrf

            <label>Nombre<br>
                <input type="text" name="nombre" value="{{old('nombre')}}">
            </label><br>
            @error('nombre'){{$message}}@enderror<br>

            <label>Correo<br>
                <input type="mail" name="correo" value="{{old('correo')}}">
            </label><br>
            @error('correo'){{$message}}@enderror<br>

            <label>Mensaje<br>
                <textarea name="mensaje" rows="5">{{old('mensaje')}}</textarea>
            </label><br>
            @error('mensaje'){{$message}}@enderror<br>

            <br>
            <button type="submit">Enviar</button>

        </form>
    </p>

    <p>
        @if (session('info'))
            <script>alert("{{session('info')}}")</script>
        @endif
    </p>
    
@endsection