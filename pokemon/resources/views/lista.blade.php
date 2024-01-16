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
                                        <p class="m-0">Are you sure you want to delete <span
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
</div>

@endsection