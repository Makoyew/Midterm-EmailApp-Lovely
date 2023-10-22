@extends('base')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8"> <!-- Adjusting the width for a different look -->
            <div class="card">
                <div class="card-header bg-info text-white text-center"> <!-- Changed the styling here -->
                    <h3>Edit Flower Details</h3>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <a class="btn btn-outline-secondary" href="{{ route('boutique.index') }}"><i class="fas fa-arrow-left"></i> Back to List</a> <!-- Changed the button style and icon -->
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('boutique.update', $boutique->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label><strong>Flower Name:</strong></label>
                                    <input type="text" name="name" class="form-control" value="{{ $boutique->name }}" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label><strong>Description:</strong></label>
                                    <textarea class="form-control" name="description" rows="4" required>{{ $boutique->description }}</textarea> <!-- Changed the textarea size -->
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label><strong>Price ($):</strong></label>
                                    <input type of "number" step="0.01" name="price" class="form-control" value="{{ $boutique->price }}" required>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-success mt-3"><i class="fas fa-save"></i> Save Changes</button> <!-- Changed the button color and added an icon -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
