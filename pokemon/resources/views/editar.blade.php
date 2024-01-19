@extends('layouts.general')

{{-- Rutas css/js --}}
@vite(['resources/js/validation.js'])

@section('editar')
    <div class="container py-3 editar-main">
        <div class="text-center">
            <h2 class="mb-3"><span class="badge rounded-pill text-bg-warning px-4">Edit Pokémon</span></h2>
        </div>

        <form id="create-pokemon-form" method="POST" action="{{ route('lista.update', $pokemon->id) }}">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <h3 class="fw-bold"><label for="name" class="form-label">Name</label></h3>
                <input type="text" class="form-control" id="name" name="name" value="{{ $pokemon->name }}"
                    required>
            </div>

            <div class="mb-3">
                <h3 class="fw-bold"><label for="type" class="form-label">Type</label></h3>
                <select id="type" class="form-select" name="type">
                    @foreach ($types as $type)
                        <option value="{{ $type }}" {{ $type == $pokemon->type ? 'selected' : '' }}>
                            {{ $type }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <h3 class="fw-bold"><label for="subtype" class="form-label">Subtype</label></h3>
                <select id="subtype" class="form-select" name="subtype">
                    @foreach ($subtypes as $subtype)
                        <option value="{{ $subtype }}" {{ $subtype == $pokemon->subtype ? 'selected' : '' }}>
                            {{ $subtype }}</option>
                    @endforeach
                    {{-- Esta opción está vacía porque se contempla el caso 
                        de que no tenga subtype --}}
                    <option class="hover-null text-white" value="" {{ is_null($pokemon->subtype) ? 'selected' : '' }}>
                        No subtype</option>
                </select>
            </div>

            <div class="mb-3">
                <h3 class="fw-bold"><label for="region" class="form-label">Region</label></h3>
                <select id="region" class="form-select" name="region">
                    @foreach ($regions as $region)
                        <option value="{{ $region }}" {{ $region == $pokemon->region ? 'selected' : '' }}>
                            {{ $region }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <h3 class="fw-bold"><label for="img" class="form-label">Images</label></h3>
                <br>
                <div class="container d-flex">

                    <div class="container custom-file col-3 m-0">
                        <input type="file" class="custom-file-input" name="img[]" id="img" multiple required>
                        <label class="custom-file-label" for="img">Choose files</label>
                    </div>

                    <div class="col-9 d-flex align-items-center">Aqui se verán las imágenes subidas</div>

                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-warning fw-medium border">Save changes</button>
            </div>
        </form>
    </div>

    </form>
    </div>
@endsection
