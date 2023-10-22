@extends('base')

@section('content')

<div class="container my-5">
    <div class="row">
        <div class="col">
            <h2 class="text-white" style="font-family: 'Playfair Display', serif; font-size: 36px; font-weight: bold;">Flower Boutique Activity</h2> <!-- Changed the title and color -->
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="bg-light rounded shadow p-4 mt-5"> <!-- Changed background color, padding, and reduced shadow -->
                <div class="table-responsive">
                    <table class="table">
                        <thead class="bg-success text-white"> <!-- Added background color to the header -->
                            <tr>
                                <th class="text-center"  scope="col">ID</th>
                                <th class="text-center"  scope="col">Activity</th> <!-- Renamed column to "Activity" -->
                                <th class="text-center" scope="col">Timestamp</th> <!-- Renamed column -->
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($logs as $log)
                            <tr>
                                <th class="text-center"  scope="row">{{ $log->id }}</th>
                                <td class="text-center" >{{ $log->log_entry }}</td>
                                <td class="text-center">{{ $log->created_at->format('Y-m-d H:i:s') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center fw-bold text-primary">No activity logs available at the moment...</td> <!-- Changed text style and wording -->
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
