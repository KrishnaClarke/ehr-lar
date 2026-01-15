@extends('layouts.layout')

@section('content')

<div>
    <h1>Patient Name - {{ $patient->first_name }} {{ $patient->last_name }}</h1>
    <p class="text-xl mb-0">Date of Birth - {{ $patient->date_of_birth }}</p>
    <p class="text-xl mb-0">Email - {{ $patient->email }}</p>

    <h2>Assigned Doctor:</h2>
    @if($patient->doctors)
        <ul>
            @foreach($patient->doctors as $doctor)
                <li>{{ $doctor->first_name }} {{ $doctor->last_name }}</li>
            @endforeach
        </ul>
    @endif

    <h2>Assigned Nurses:</h2>
    @if($patient->nurses)
        <ul>
            @foreach($patient->nurses as $nurse)
                <li>{{ $nurse->id }}</li>
                <li>{{ $nurse->first_name }}</li>
                <li>{{ $nurse->last_name }}</li><br>
            @endforeach
        </ul>
    @endif

   

    <form action="/patients/{{$patient->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button>Discharge Patient</button>
    </form>
</div>

<a href="/patients" class="btn btn-primary mt-3 wow zoomIn"><- Back to all Patients</a>

@endsection
