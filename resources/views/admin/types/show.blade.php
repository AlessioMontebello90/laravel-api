@extends('layouts.app')

@section('import-cdn')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="container mt-5">
        <a class="" href="{{ route('admin.types.index') }}">
            <div class="my-3 btn btn-success">
                back to index
            </div>
        </a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Label</th>
                    <th scope="col">Color</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <th scope="row">{{ $type->id }}</th>
                    <td>{{ $type->label }}</td>
                    <td>
                        <span class="badge" style="background-color: {{ $type->color }}">{{ $type->color }}</span>
                    </td>

                    <td>
                        <div class="d-flex gap-2 my-1  justify-content-center align-items-center">
                            <a href="{{ route('admin.types.edit', $type) }}">
                                <i class="fa-solid fa-file-pen"></i>
                            </a>

                            <span class="delete-btn" data-bs-toggle="modal" data-bs-target="#modal-{{ $type->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </span>
                        </div>
                    </td>

                </tr>
            </tbody>

        </table>
    </div>
@endsection

@section('modals')
    <!-- Modal -->
    <div class="modal fade" id="modal-{{ $type->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h1 class="modal-title fs-5" id="exampleModalLabel"> Delete {{ $type->label }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    confirm the deletion of <span class="text-danger fw-bolder">{{ $type->label }}</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Decline</button>
                    <form action="{{ route('admin.types.destroy', $type) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
