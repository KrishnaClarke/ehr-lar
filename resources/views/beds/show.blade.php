@extends('layouts.layout')

@section('content')


    <div > 
        <h1>Bed id - {{$bed->id}}</h1>
        <p class="text-xl mb-0">Ward id - {{$bed->ward_id}}</p>
        <p class="text-xl mb-0">Occupied - {{$bed->occupied}}</p>

        <h2>Assigned Patient:</h2>
        @if ($patient)
            <p>{{ $patient->id }}</p>
            <p>{{ $patient->first_name }}</p>
            <p>{{ $patient->last_name }}</p>
        @else
            <p>No patient assigned.</p>
        @endif

        <form action="/beds/{{$bed->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button>Throw away bed</button>
        </form>
                                    </div>
                              
                                  <a href="/beds" class="btn btn-primary mt-3 wow zoomIn"><- Back to all Beds </a>
                                  <a href="/beds/update" class="btn btn-primary mt-3 wow zoomIn">Update bed</a>
                            </div>


@endsection