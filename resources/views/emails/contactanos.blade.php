<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Correo electrónico desde Laravel 9</title>

    <style>
        h1{
            color: blueviolet;
        }
    </style>

</head>
<body>

    <h1>Correo electrónico de contacto</h1>
    <p>Este es el primer correo electrónico de contacto a través de Laravel.</p>

    <p><strong> Nombre:</strong> {{$contacto['nombre']}}</p>
    <p><strong> Correo:</strong> {{$contacto['correo']}}</p>
    <p><strong> Mensaje:</strong> {{$contacto['mensaje']}}</p>
    
</body>
</html>