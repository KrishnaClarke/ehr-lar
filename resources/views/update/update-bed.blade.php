

@extends('layouts.layout')

@section('content')

<h1>Remove Patient from Bed</h1>

<form action="{{ route('update-bed-submit') }}" method="POST">
    @csrf

    <div>
        <label for="bed_id">Bed ID:</label>
        <select name="bed_id" id="bed_id">
            @foreach($beds as $bed)
                <option value="{{ $bed->id }}">{{ $bed->id }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="patient_id">Patient ID:</label>
        <select name="patient_id" id="patient_id">
            @foreach($patients as $patient)
                <option value="{{ $patient->id }}">
                    {{ $patient->id }}: {{ $patient->first_name }} {{ $patient->last_name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="occupied">Occupied:</label>
        <input type="text" name="occupied" id="occupied">
    </div>

    <button type="submit">Remove Patient from Bed</button>
</form>

@endsection


