@extends('layouts.layout')

@section('title', 'Bed '.$bed->id)

@section('content')
<a href="/beds" class="btn btn-sm btn-outline-secondary mb-3">&larr; All beds</a>

<h1>Bed {{ $bed->id }}</h1>
<p class="mb-1">Ward: {{ optional($bed->ward)->name }}</p>
<p>Status: <span class="badge {{ $bed->occupied ? 'badge-warning' : 'badge-success' }}">{{ $bed->occupied ? 'Occupied' : 'Free' }}</span></p>

<h3 class="mt-4">Patient</h3>
@if ($patient)
  <p><a href="/patients/{{ $patient->id }}">{{ $patient->full_name }}</a></p>
@else
  <p class="text-muted">No patient in this bed.</p>
@endif

<form action="/beds/{{ $bed->id }}" method="POST" class="mt-4" onsubmit="return confirm('Remove this bed?')">
  @csrf
  @method('DELETE')
  <button class="btn btn-outline-danger btn-sm">Remove bed</button>
</form>
@endsection
