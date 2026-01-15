
@extends('layouts.layout')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<a href ="/beds/create" class="btn btn-primary mt-3 wow zoomIn">Add new Bed</a>
@if($beds->count() > 0)
<table>
    <thead>
        <tr>
            <th>Bed id</th>
            <th>Ward</th>
            <th>Patient first Name</th>
            <th>Patient last Name</th>
            <th>Patient Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($beds as $bed)
            <tr>
                <td><a href="/beds/{{ $bed->id }}">{{ $bed->id }}</td>
                <td>{{ optional($bed->ward)->name }}</td>
                <td>{{ optional($bed->patient)->first_name }}</td>
                <td>{{ optional($bed->patient)->last_name }}</td>
                <td>{{ optional($bed->patient)->email }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@else
    <p>No data available</p>
@endif


<a href="/assign/assign-bed-to-patient" class="btn btn-primary mt-3 wow zoomIn">assign patient to bed</a>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


@endsection