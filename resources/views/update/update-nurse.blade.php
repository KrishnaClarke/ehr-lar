@extends('layouts.layout')

@section('content')

<h1>Update Patient to Nurse</h1>

<form action="{{ route('update-patient-to-nurse-submit') }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="patient_id">Patient:</label>
        <select name="patient_id" id="patient_id">
            @foreach($patients as $patient)
                <option value="{{ $patient->id }}">
                    {{ $patient->id }}: {{ $patient->first_name }} {{ $patient->last_name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="nurse_id">Nurse:</label>
        <select name="nurse_id" id="nurse_id">
            @foreach($nurses as $nurse)
                <option value="{{ $nurse->id }}" >
                    {{ $nurse->id }}: {{ $nurse->first_name }} {{ $nurse->last_name }}
                </option>
            @endforeach
        </select>
    </div>

    
    <div>
        <label for="active">Active:</label>
        <input type="text" name="active" id="active" >
    </div>

 

    <div>
        <label for="date_unassigned">Date Unassigned:</label>
        <input type="date" name="date_unassigned" id="date_unassigned" placeholder="yyyy-mm-dd" required >
    </div>

    <button type="submit">Update Patient to Nurse</button>
</form>

@endsection
