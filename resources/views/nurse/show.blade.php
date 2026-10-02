@extends('layouts.layout')

@section('title', $nurse->first_name.' '.$nurse->last_name)

@section('content')
<a href="/nurses" class="btn btn-sm btn-outline-secondary mb-3">&larr; All nurses</a>

<div class="d-flex justify-content-between align-items-start">
  <div>
    <h1>{{ $nurse->first_name }} {{ $nurse->last_name }}</h1>
    <p class="mb-1">Date of birth: {{ $nurse->date_of_birth }}</p>
    <p>Email: {{ $nurse->email }}</p>
  </div>
  <a href="/nurses/{{ $nurse->id }}/edit" class="btn btn-sm btn-outline-primary">Edit details</a>
</div>

<h3 class="mt-4">Current patients</h3>
@forelse ($patients as $patient)
  @if ($loop->first)<ul>@endif
  <li>
    <a href="/patients/{{ $patient->id }}">{{ $patient->first_name }} {{ $patient->last_name }}</a>
    @if ($patient->activeDoctors->count())
      <span class="text-muted">&ndash; {{ $patient->activeDoctors->map(fn ($d) => 'Dr. '.$d->last_name)->join(', ') }}</span>
    @endif
  </li>
  @if ($loop->last)</ul>@endif
@empty
  <p class="text-muted">No active patients.</p>
@endforelse

<h3 class="mt-4">Nurses working with the same doctors</h3>
@forelse ($colleagues as $colleague)
  @if ($loop->first)<ul>@endif
  <li><a href="/nurses/{{ $colleague->id }}">{{ $colleague->first_name }} {{ $colleague->last_name }}</a></li>
  @if ($loop->last)</ul>@endif
@empty
  <p class="text-muted">None.</p>
@endforelse

<form action="/nurses/{{ $nurse->id }}" method="POST" class="mt-4"
      onsubmit="return confirm('Delete this nurse?')">
  @csrf
  @method('DELETE')
  <button class="btn btn-outline-danger btn-sm">Delete nurse</button>
</form>
@endsection
