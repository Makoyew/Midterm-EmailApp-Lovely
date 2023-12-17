@extends('base')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <h1 class="text-white" style="font-family: 'Playfair Display', serif; font-size: 36px; font-weight: bold;">Flower Boutique</h1>
                @role('admin')
                <a class="btn btn-info text-white" href="{{ route('boutique.create') }}">
                    <i class="fas fa-plus-circle"></i> Add New Flower
                </a>
                @endrole
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header bg-light text-center">
                    Flowers Information
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Flower</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center" width="280px">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($boutique as $flower)
                                    <tr>
                                        <td class="text-center">{{ $flower->id }}</td>
                                        <td class="text-center">{{ $flower->name }}</td>
                                        <td class="text-center">{{ $flower->description }}</td>
                                        <td class="text-center">${{ $flower->price }}</td>
                                        <td class="text-center">
                                            @role('admin')
                                            <form action="{{ route('boutique.destroy', $flower->id) }}" method="POST">
                                                <a class="btn btn-outline-primary" href="{{ route('boutique.edit', $flower->id) }}">
                                                    <i class="fas fa-edit"></i> <!-- Edit Icon -->
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger">
                                                    <i class="fas fa-trash-alt"></i> <!-- Delete Icon -->
                                                </button>
                                            </form>
                                            @endrole

                                            @role('user')
                                                <form action="{{ route('boutique.reserve', $flower->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">
                                                        Reserve
                                                    </button>
                                                </form>
                                            @endrole

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
