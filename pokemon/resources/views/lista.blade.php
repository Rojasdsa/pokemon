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
                            {{-- Botón para editar un Pokémon --}}
                            <a href="{{ route('lista.edit', $pokemon->id) }}" class="btn btn-primary">Editar</a>

                            {{-- Botón para eliminar un Pokémon --}}
                            <a href="#exampleModal{{ $pokemon->id }}" class="btn" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $pokemon->id }}">Eliminar</a>

                            <!-- Modal para eliminar un pokemon -->
                            <div class="modal fade" id="exampleModal{{ $pokemon->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Eliminar Pokémon</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Estás seguro de que deseas eliminar el Pokémon "{{ $pokemon->name }}"?
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('lista.delete', $pokemon->id) }}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <button type="submit" class="btn btn-danger">Sí, eliminar</button>
                                            </form>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</body>

</html>