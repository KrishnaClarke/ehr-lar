@extends('layouts.layout')

@section('title', 'Assign nurse')

@section('content')
<h1>Assign a nurse to a patient</h1>

<form action="{{ route('assign-nurse-to-patient-submit') }}" method="POST">
  @csrf
  <div class="form-group">
    <label for="nurse_id">Nurse</label>
    <select name="nurse_id" id="nurse_id" class="form-control" required>
      @foreach ($nurses as $nurse)
        <option value="{{ $nurse->id }}" @selected((int) old('nurse_id') === $nurse->id)>{{ $nurse->first_name }} {{ $nurse->last_name }}</option>
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
    <label for="date_assigned">Date assigned</label>
    <input type="date" name="date_assigned" id="date_assigned" class="form-control" value="{{ old('date_assigned', now()->toDateString()) }}" required>
  </div>
  <input type="hidden" name="active" value="1">
  <button type="submit" class="btn btn-primary">Assign nurse</button>
</form>
@endsection
