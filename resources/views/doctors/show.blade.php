@extends('layouts.layout')

@section('title', 'Dr. '.$doctor->last_name)

@section('content')
<a href="/doctors" class="btn btn-sm btn-outline-secondary mb-3">&larr; All doctors</a>

<div class="d-flex justify-content-between align-items-start">
  <div>
    <h1>Dr. {{ $doctor->first_name }} {{ $doctor->last_name }}</h1>
    <p class="mb-1">Date of birth: {{ $doctor->date_of_birth }}</p>
    <p>Email: {{ $doctor->email }}</p>
  </div>
  <a href="/doctors/{{ $doctor->id }}/edit" class="btn btn-sm btn-outline-primary">Edit details</a>
</div>

<h3 class="mt-4">Patients</h3>
@forelse ($patients as $patient)
  @if ($loop->first)<ul>@endif
  <li>
    <a href="/patients/{{ $patient->id }}">{{ $patient->first_name }} {{ $patient->last_name }}</a>
    &ndash; {{ $patient->pivot->disease }}
    <span class="text-muted">({{ $patient->pivot->date_assigned }}{{ $patient->pivot->active ? ', active' : ' to '.$patient->pivot->date_unassigned }})</span>
  </li>
  @if ($loop->last)</ul>@endif
@empty
  <p class="text-muted">No patients assigned.</p>
@endforelse

<form action="/doctors/{{ $doctor->id }}" method="POST" class="mt-4"
      onsubmit="return confirm('Delete this doctor?')">
  @csrf
  @method('DELETE')
  <button class="btn btn-outline-danger btn-sm">Delete doctor</button>
</form>
@endsection
