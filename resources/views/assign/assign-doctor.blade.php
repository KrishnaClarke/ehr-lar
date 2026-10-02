@extends('layouts.layout')

@section('title', 'Assign doctor')

@section('content')
<h1>Assign a doctor to a patient</h1>

<form action="{{ route('assign-doctor-submit') }}" method="POST">
  @csrf
  <div class="form-group">
    <label for="doctor_id">Doctor</label>
    <select name="doctor_id" id="doctor_id" class="form-control" required>
      @foreach ($doctors as $doctor)
        <option value="{{ $doctor->id }}" @selected((int) old('doctor_id') === $doctor->id)>Dr. {{ $doctor->first_name }} {{ $doctor->last_name }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="patient_id">Patient (admitted only)</label>
    <select name="patient_id" id="patient_id" class="form-control" required>
      @foreach ($patients as $patient)
        <option value="{{ $patient->id }}" @selected((int) old('patient_id') === $patient->id)>{{ $patient->last_name }}, {{ $patient->first_name }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="disease">Condition</label>
    <input type="text" name="disease" id="disease" class="form-control" value="{{ old('disease') }}" required>
  </div>
  <div class="form-group">
    <label for="date_assigned">Date assigned</label>
    <input type="date" name="date_assigned" id="date_assigned" class="form-control" value="{{ old('date_assigned', now()->toDateString()) }}" required>
  </div>
  <input type="hidden" name="active" value="1">
  <button type="submit" class="btn btn-primary">Assign doctor</button>
</form>
@endsection
