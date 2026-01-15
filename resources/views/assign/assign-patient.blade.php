

@extends('layouts.layout')

@section('content')

<h1>Assign Patient to Doctor</h1>

<form action="{{ route('assign-patient-submit') }}" method="POST">
    @csrf

    <div>
        <label for="doctor_id">Doctor:</label>
        <select name="doctor_id" id="doctor_id">
            @foreach($doctors as $doctor)
                <option value="{{ $doctor->id }}">{{ $doctor->id }}: {{ $doctor->first_name }} {{ $doctor->last_name }}</option>
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
        <label for="active">Active:</label>
        <input type="checkbox" name="active" id="active" >
    </div>

    <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <label for="disease">disease:</label>
            <input type="text" class="form-control" name="disease" id="disease" required>
          </div>

    <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <label for="date_assigned">date assigned:</label>
            <input type="text" class="form-control" name="date_assigned" id="date_assigned" placeholder="yyyy-mm-dd" required>
          </div>

    <button type="submit">Assign Patient to Doctor</button>
</form>



@endsection