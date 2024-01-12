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
    <div class="container">
        <h2>Editar Pokémon</h2>

        <form method="POST" action="{{ route('lista.update', $pokemon->id) }}">
            @csrf
            {{-- Debería enviarla con método PUT. Hay que arreglarlo --}}
            @method('POST')

            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $pokemon->name }}"
                    required>
            </div>

            <div class="form-group">
                <label for="type">Tipo:</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="fire" {{ $pokemon->type === 'fire' ? 'selected' : '' }}>Fuego</option>
                    <option value="water" {{ $pokemon->type === 'water' ? 'selected' : '' }}>Agua</option>
                    <option value="grass" {{ $pokemon->type === 'grass' ? 'selected' : '' }}>Planta</option>
                </select>
            </div>

            <div class="form-group">
                <label for="subtype">Subtipo:</label>
                <select class="form-control" id="subtype" name="subtype" required>
                    <option value="fighting" {{ $pokemon->subtype === 'fighting' ? 'selected' : '' }}>Lucha</option>
                    <option value="psychic" {{ $pokemon->subtype === 'psychic' ? 'selected' : '' }}>Psíquico</option>
                    <option value="poison" {{ $pokemon->subtype === 'poison' ? 'selected' : '' }}>Veneno</option>
                </select>
            </div>

            <div class="form-group">
                <label for="region">Región:</label>
                <select class="form-control" id="region" name="region" required>
                    <option value="Kanto" {{ $pokemon->region === 'Kanto' ? 'selected' : '' }}>Kanto</option>
                    <option value="Johto" {{ $pokemon->region === 'Johto' ? 'selected' : '' }}>Johto</option>
                    <option value="Hoenn" {{ $pokemon->region === 'Hoenn' ? 'selected' : '' }}>Hoenn</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
</body>

</html>
