@extends('layouts.layout')

@section('content')

<h1>Assign Bed to Patient</h1>

<form action="{{ route('assign-bed-to-patient-submit') }}" method="POST">
    @csrf
    <div>
        <label for="bed_id">Bed:</label>
        <select name="bed_id" id="bed_id">
            @foreach($beds as $bed)
                <option value="{{ $bed->id }}">{{ $bed->id }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="patient_id">Patient:</label>
        <select name="patient_id" id="patient_id">
            @foreach($patients as $patient)
                <option value="{{ $patient->id }}">{{ $patient->id }}: {{ $patient->first_name }} {{ $patient->last_name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="occupied">Occupied:</label>
        <input type="text" name="occupied" id="occupied">
    </div>

    <button type="submit">Assign Bed to Patient</button>
</form>


<a href="/beds"  class="btn btn-primary mt-3 wow zoomIn"><- Back to all beds </a>
@endsection
