@extends('layouts.layout')

@section('title', $patient->full_name)

@section('content')
<a href="/patients" class="btn btn-sm btn-outline-secondary mb-3">&larr; All patients</a>

<div class="d-flex justify-content-between align-items-start">
  <div>
    <h1>{{ $patient->full_name }}
      <span class="badge {{ $admitted ? 'badge-success' : 'badge-secondary' }}">{{ $admitted ? 'Admitted' : 'Discharged' }}</span>
    </h1>
    <p class="mb-1">Date of birth: {{ $patient->date_of_birth }}</p>
    <p class="mb-1">Email: {{ $patient->email }}</p>
    <p>Location:
      @if ($patient->bed)
        {{ $patient->bed->ward->name }}, bed {{ $patient->bed->id }}
      @else
        no bed assigned
      @endif
    </p>
  </div>
  <div>
    <a href="/patients/{{ $patient->id }}/edit" class="btn btn-sm btn-outline-primary">Edit details</a>
  </div>
</div>

<h3 class="mt-4">Doctors</h3>
@forelse ($patient->doctors as $doctor)
  @if ($loop->first)<ul>@endif
  <li>
    <a href="/doctors/{{ $doctor->id }}">Dr. {{ $doctor->first_name }} {{ $doctor->last_name }}</a>
    &ndash; {{ $doctor->pivot->disease }}
    <span class="text-muted">({{ $doctor->pivot->date_assigned }}{{ $doctor->pivot->active ? ', active' : ' to '.$doctor->pivot->date_unassigned }})</span>
  </li>
  @if ($loop->last)</ul>@endif
@empty
  <p class="text-muted">No doctors assigned.</p>
@endforelse

<h3 class="mt-4">Nurses</h3>
@forelse ($patient->nurses as $nurse)
  @if ($loop->first)<ul>@endif
  <li>
    <a href="/nurses/{{ $nurse->id }}">{{ $nurse->first_name }} {{ $nurse->last_name }}</a>
    <span class="text-muted">({{ $nurse->pivot->date_assigned }}{{ $nurse->pivot->active ? ', active' : ' to '.$nurse->pivot->date_unassigned }})</span>
  </li>
  @if ($loop->last)</ul>@endif
@empty
  <p class="text-muted">No nurses assigned.</p>
@endforelse

<h3 class="mt-4">Admissions</h3>
<ul>
  @foreach ($patient->records->sortByDesc('date_of_admission') as $record)
    <li>Admitted {{ $record->date_of_admission }} &ndash; {{ $record->date_of_release ? 'released '.$record->date_of_release : 'still admitted' }}</li>
  @endforeach
</ul>

@if ($admitted)
  <form action="/patients/{{ $patient->id }}/discharge" method="POST" class="mt-4"
        onsubmit="return confirm('Discharge this patient? The record is kept.')">
    @csrf
    <button class="btn btn-danger">Discharge patient</button>
  </form>
@endif
@endsection
