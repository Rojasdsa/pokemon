<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pokemon</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<body>

    <div class="container py-3">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Subtipo</th>
                    <th>Región</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pokemons as $pokemon)
                    <tr>
                        <td>{{ $pokemon->name }}</td>
                        <td>{{ $pokemon->type }}</td>
                        <td>{{ $pokemon->subtype }}</td>
                        <td>{{ $pokemon->region }}</td>

                        <td>
                            {{-- Botón para editar un pokemon --}}
                            <a href="{{ route('lista.edit', $pokemon->id) }}" class="btn btn-primary">Editar</a>

                            {{-- Botón para eliminar un pokemon --}}
                            <form action="{{ route('lista.delete', $pokemon->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>






</body>

</html>
