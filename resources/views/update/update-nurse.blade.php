@extends('layouts.layout')

@section('title', 'Unassign nurse')

@section('content')
<h1>Unassign a nurse from a patient</h1>

<form action="{{ route('update-patient-to-nurse-submit') }}" method="POST">
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
    <label for="nurse_id">Nurse</label>
    <select name="nurse_id" id="nurse_id" class="form-control" required>
      @foreach ($nurses as $nurse)
        <option value="{{ $nurse->id }}">{{ $nurse->first_name }} {{ $nurse->last_name }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="date_unassigned">Date unassigned</label>
    <input type="date" name="date_unassigned" id="date_unassigned" class="form-control" value="{{ now()->toDateString() }}" required>
  </div>
  <button type="submit" class="btn btn-primary">Unassign nurse</button>
</form>
@endsection
