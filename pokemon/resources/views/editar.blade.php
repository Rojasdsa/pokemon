<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pokémon</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <script src="{{ asset('js/custom.js') }}"></script>
</head>

<body>
    <div class="container py-3">
        <div class="text-center">
            <h2 class="mb-3"><span class="badge rounded-pill text-bg-warning px-4">Edit Pokémon</span></h2>
        </div>

        <form method="POST" action="{{ route('lista.update', $pokemon->id) }}">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <h3 class="fw-bold"><label for="name" class="form-label">Name</label></h3>
                <input type="text" class="form-control" id="name" name="name" value="{{ $pokemon->name }}"
                    required>
            </div>

            <div class="mb-3">
                <h3 class="fw-bold"><label for="type" class="form-label">Type</label></h3>
                <select class="form-select" name="type">
                    @foreach ($types as $type)
                        <option value="{{ $type }}" {{ $type == $pokemon->type ? 'selected' : '' }}>
                            {{ $type }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <h3 class="fw-bold"><label for="subtype" class="form-label">Subtype</label></h3>
                <select class="form-select" name="subtype">
                    @foreach ($subtypes as $subtype)
                    <option value="{{ $subtype }}" {{ $subtype == $pokemon->subtype ? 'selected' : '' }}>
                        {{ $subtype }}</option>
                        @endforeach
                        {{-- Esta opción está vacía porque se contempla el caso 
                            de que no tenga subtype --}}
                        <option value="" {{ is_null($pokemon->subtype) ? 'selected' : '' }}></option>
                </select>
            </div>

            <div class="mb-3">
                <h3 class="fw-bold"><label for="region" class="form-label">Region</label></h3>
                <select class="form-select" name="region">
                    @foreach ($regions as $region)
                        <option value="{{ $region }}" {{ $region == $pokemon->region ? 'selected' : '' }}>
                            {{ $region }}</option>
                    @endforeach
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-warning fw-medium">Save changes</button>
            </div>
        </form>
    </div>

</body>


</html>
