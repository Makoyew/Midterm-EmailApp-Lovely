@extends('base')

@section('content')
<div class="container mt-5">
    <h1>Reserved Boutiques</h1>
    <div class="row mt-4">
        @foreach($reservedBoutiques as $boutique)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ $boutique->name }}</h3>
                        <p class="card-text"><strong>Status:</strong>
                            @if($boutique->is_rejected)
                                Rejected
                            @elseif($boutique->is_accepted)
                                Accepted

                            @else
                                Pending
                            @endif
                        </p>
                        <p class="card-text"><strong>Price:</strong> ${{ $boutique->price }}</p>
                        <p class="card-text"><strong>Description:</strong> {{ $boutique->description }}</p>

                        <!-- Display other details of the reserved boutique -->
                        @if(!$boutique->is_accepted && !$boutique->is_rejected)
                            <form action="{{ route('accept.reservation', $boutique->id) }}" method="POST" class="mb-2">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success mr-2">Accept</button>
                            </form>
                            <form action="{{ route('reject.reservation', $boutique->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger">Reject</button>
                            </form>



                        @endif


                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
