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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="container py-3">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nombre
                        <a
                            href="{{ route('lista.show', ['orderField' => 'name', 'order' => $order == 'asc' ? 'desc' : 'asc']) }}">
                            {{ $order == 'asc' ? 'Desc' : 'Asc' }}
                        </a>
                        {{-- <a href="#" onclick="orderPokemons('name', 'asc')"><i class="fa-solid fa-arrow-up"></i></a>
                        <a href="#" onclick="orderPokemons('name', 'desc')"><i class="fa-solid fa-arrow-down"></i></a>
                   --}}
                    </th>
                    <th>Tipo
                        <a
                            href="{{ route('lista.show', ['orderField' => 'type', 'order' => $order == 'asc' ? 'desc' : 'asc']) }}">
                            {{ $order == 'asc' ? 'Desc' : 'Asc' }}
                        </a>

                    </th>
                    <th>Subtipo
                        <a
                            href="{{ route('lista.show', ['orderField' => 'subtype', 'order' => $order == 'asc' ? 'desc' : 'asc']) }}">
                            {{ $order == 'asc' ? 'Desc' : 'Asc' }}
                        </a>

                    </th>
                    <th>Región
                        <a
                            href="{{ route('lista.show', ['orderField' => 'region', 'order' => $order == 'asc' ? 'desc' : 'asc']) }}">
                            {{ $order == 'asc' ? 'Desc' : 'Asc' }}
                        </a>

                    </th>
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
