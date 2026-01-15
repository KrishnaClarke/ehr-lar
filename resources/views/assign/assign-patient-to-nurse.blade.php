@extends('layouts.layout')

@section('content')

<h1>Assign Nurse to Patient</h1>

<form action="{{ route('assign-patient-to-nurse-submit') }}" method="POST">
    @csrf

    <div>
        <label for="nurse_id">Nurse:</label>
        <select name="nurse_id" id="nurse_id">
            @foreach($nurses as $nurse)
                <option value="{{ $nurse->id }}">{{ $nurse->id }}:{{ $nurse->first_name }} {{ $nurse->last_name }}</option>
            @endforeach
        </select>
    </div>

    
    <div>
        <label for="active">Active:</label>
        <input type="checkbox" name="active" id="active" >
    </div>

    <div>
        <label for="patient_id">Patient:</label>
        <select name="patient_id" id="patient_id">
            @foreach($patients as $patient)
                <option value="{{ $patient->id }}">{{ $patient->id }}:{{ $patient->first_name }} {{ $patient->first_name }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <label for="date_assigned">date assigned:</label>
            <input type="text" class="form-control" name="date_assigned" id="date_assigned" placeholder="yyyy-mm-dd" required>
          </div>

    <button type="submit">Assign Nurse to Patient</button>
</form>


@endsection