@extends('layouts.layout')

@section('title', 'Assign bed')

@section('content')
<h1>Move a patient to a bed</h1>
<p class="text-muted">Only free beds are listed. If the patient already has a bed, it is freed.</p>

<form action="{{ route('assign-bed-to-patient-submit') }}" method="POST">
  @csrf
  <div class="form-group">
    <label for="patient_id">Patient (admitted only)</label>
    <select name="patient_id" id="patient_id" class="form-control" required>
      @foreach ($patients as $patient)
        <option value="{{ $patient->id }}" @selected((int) old('patient_id') === $patient->id)>{{ $patient->last_name }}, {{ $patient->first_name }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="bed_id">Free bed</label>
    <select name="bed_id" id="bed_id" class="form-control" required>
      @forelse ($beds as $bed)
        <option value="{{ $bed->id }}">{{ $bed->ward->name }} &middot; bed {{ $bed->id }}</option>
      @empty
        <option value="" disabled selected>No free beds</option>
      @endforelse
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Assign bed</button>
</form>
@endsection
