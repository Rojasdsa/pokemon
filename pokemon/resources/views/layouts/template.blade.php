<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pokémon</title>

    {{-- css/js de bootstrap --}}
    @vite([
        'resources/js/app.js', 
        'resources/css/custom.scss', //Aquí está bootstrap
        'resources/css/app.scss', 
        'resources/css/app.css',
        ])
    {{-- Iconos --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- css/js propios --}}
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</head>

<body>

@yield('general')

</body>
</html>