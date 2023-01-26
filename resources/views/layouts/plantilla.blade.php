<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!--- script src="https://cdn.tailwindcss.com"></script-->

    <!-- Favicon -->

    <!-- Estilos -->
    <style>
        a:-webkit-any-link {
            color: -webkit-link;
            cursor: pointer;
            text-decoration: none !important;
        }

        .active{
            color: red !important;
            font-weight: bold;
        }
    </style>
</head>
<body>

    @include('layouts.partials.header')

    @yield('content')

    @include('layouts.partials.footer')

</body>
</html>
