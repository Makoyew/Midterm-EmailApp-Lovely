@extends('base')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8"> <!-- Adjusted the column size for a different look while maintaining form consistency -->
            <div class="card">
                <div class="card-header bg-info text-white text-center"> <!-- Changed the header color for a unique style -->
                    <h4>Add New Flower</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <a class="btn btn-outline-secondary" href="{{ route('boutique.index') }}" title="Go back"> <i class="fas fa-arrow-left"></i> Back to List</a> <!-- Changed the back button style and icon -->
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Error!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('boutique.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label><strong>Name:</strong></label>
                                    <input type="text" name="name" class="form-control" placeholder="Flower Name" required> <!-- Added a placeholder for more user-friendly guidance -->
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label><strong>Description:</strong></label>
                                    <textarea class="form-control" style="height:110px" name="description" placeholder="Flower Description" required></textarea> <!-- Added a placeholder and maintained consistent height -->
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label><strong>Price ($):</strong></label>
                                    <input type="number" name="price" class="form-control" placeholder="Flower Price" step="0.01" required> <!-- Added a placeholder -->
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-success mt-3">Add Flower</button> <!-- Changed button text and color for a unique style -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
