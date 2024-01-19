@extends('layouts.general')

@section('lista')
    <div class=" lista-main container py-3">

        <div class="text-center">
            <h2 class="mb-3"><span class="badge rounded-pill text-bg-warning px-4">Show Pokemon</span></h2>
        </div>

        <table class="table table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th scope="col">
                        <div class="d-flex justify-content-evenly">
                            <span>Name</span>
                            <a
                                href="{{ route('lista.show', ['orderField' => 'name', 'order' => $order == 'asc' ? 'desc' : 'asc']) }}">
                                @if ($order == 'asc')
                                    <i class="fa-solid fa-arrow-up text-dark"></i>
                                @else
                                    <i class="fa-solid fa-arrow-down text-dark"></i>
                                @endif
                            </a>
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex justify-content-evenly">
                            <span>Type</span>
                            <a
                                href="{{ route('lista.show', ['orderField' => 'type', 'order' => $order == 'asc' ? 'desc' : 'asc']) }}">
                                @if ($order == 'asc')
                                    <i class="fa-solid fa-arrow-up text-dark"></i>
                                @else
                                    <i class="fa-solid fa-arrow-down text-dark"></i>
                                @endif
                            </a>
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex justify-content-evenly">
                            <span>Subtype</span>
                            <a
                                href="{{ route('lista.show', ['orderField' => 'subtype', 'order' => $order == 'asc' ? 'desc' : 'asc']) }}">
                                @if ($order == 'asc')
                                    <i class="fa-solid fa-arrow-up text-dark"></i>
                                @else
                                    <i class="fa-solid fa-arrow-down text-dark"></i>
                                @endif
                            </a>
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex justify-content-evenly">
                            <span>Region</span>
                            <a
                                href="{{ route('lista.show', ['orderField' => 'region', 'order' => $order == 'asc' ? 'desc' : 'asc']) }}">
                                @if ($order == 'asc')
                                    <i class="fa-solid fa-arrow-up text-dark"></i>
                                @else
                                    <i class="fa-solid fa-arrow-down text-dark"></i>
                                @endif
                            </a>
                        </div>
                    </th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pokemons as $pokemon)
                    <tr>
                        <td class="align-middle">{{ $pokemon->name }}</td>
                        <td class="align-middle">{{ $pokemon->type }}</td>
                        <td class="align-middle">{{ $pokemon->subtype }}</td>
                        <td class="align-middle">{{ $pokemon->region }}</td>

                        <td class="align-middle">
                            <div class="d-flex justify-content-center">
                                {{-- Botón para editar un Pokémon --}}
                                <a href="{{ route('lista.edit', $pokemon->id) }}" class="btn btn-primary mx-1">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>

                                {{-- Botón para eliminar un Pokémon --}}
                                <a href="#exampleModal{{ $pokemon->id }}" class="btn btn-danger mx-1"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal{{ $pokemon->id }}">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </div>
                            {{-- Modal para eliminar un pokemon --}}
                            <div class="modal fade" id="exampleModal{{ $pokemon->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Pokémon</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="m-0 fw-medium">Are you sure you want to delete <span
                                                    class="fw-bolder">{{ $pokemon->name }}</span> ?
                                            </p>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <form action="{{ route('lista.delete', $pokemon->id) }}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <button type="submit" class="btn btn-danger">Yes, delete</button>
                                            </form>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Back</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- <img class="card-img rounded-0 img-fluid" src="/assets/img/{{ $pokemon->id }}/{{ $pokemon->id }}_0.png"> --}}
        
        
        <div class="container text-center mb-5">
            {{-- Botón para cambiar el color del navbar (COOKIES) --}}
            <a href="" class="btn btn-warning mx-1" data-bs-toggle="modal" data-bs-target="#colorModal">
                <i class="fa-solid fa-gear"></i>
            </a>

            {{-- Botón para crear un Pokémon --}}
            <a href="{{ route('lista.new') }}" class="btn btn-warning mx-1">
                <i class="fa-solid fa-plus"></i>
            </a>

            {{-- Botón para añadir 10 pokémon iniciales --}}
            <a href="{{ route('lista.starters') }}" class="btn btn-warning mx-1">
                <i class="fa-solid fa-wand-magic-sparkles"></i>
            </a>
        </div>
        {{-- Modal para cambiar el color del navbar (COOKIES) --}}
        <div class="modal fade" id="colorModal" tabindex="-1" aria-labelledby="colorModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="colorModalLabel">Select your color</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center pb-0">

                        {{-- FORM --}}
                        <form action="{{ route('lista.color') }}" method="POST" enctype="multipart/form-data"
                            id="colorPreferenceForm">
                            @csrf
                            @method('POST')
                            <p class="m-0 pb-2">Which one do you prefer?
                            <div class="col-4 form-group">
                                <label for="color" class="hidden">Color:</label>
                                <input type="color" name="color" id="color" class="form-control"
                                    value="{{ Auth::user()->color_preference }}" required>
                                <button type="submit" class="btn btn-primary mt-5">Guardar</button>
                            </div>
                            </p>
                        </form>


                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection
