@extends('layouts.layout')

@section('title', 'Unassign doctor')

@section('content')
<h1>Unassign a doctor from a patient</h1>

<form action="{{ route('update-doc-submit') }}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="patient_id">Patient</label>
    <select name="patient_id" id="patient_id" class="form-control" required>
      @foreach ($patients as $patient)
        <option value="{{ $patient->id }}">{{ $patient->last_name }}, {{ $patient->first_name }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="doctor_id">Doctor</label>
    <select name="doctor_id" id="doctor_id" class="form-control" required>
      @foreach ($doctors as $doctor)
        <option value="{{ $doctor->id }}">Dr. {{ $doctor->first_name }} {{ $doctor->last_name }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="date_unassigned">Date unassigned</label>
    <input type="date" name="date_unassigned" id="date_unassigned" class="form-control" value="{{ now()->toDateString() }}" required>
  </div>
  <button type="submit" class="btn btn-primary">Unassign doctor</button>
</form>
@endsection
