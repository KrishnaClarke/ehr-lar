@extends('layouts.layout')

@section('title', 'Beds')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="mb-0">Beds</h1>
  <a href="/beds/create" class="btn btn-primary">Add bed</a>
</div>

@if ($beds->count())
  <table class="table table-striped table-sm">
    <thead><tr><th>Bed</th><th>Ward</th><th>Status</th><th>Patient</th></tr></thead>
    <tbody>
      @foreach ($beds as $bed)
        <tr>
          <td><a href="/beds/{{ $bed->id }}">{{ $bed->id }}</a></td>
          <td>{{ optional($bed->ward)->name }}</td>
          <td>
            <span class="badge {{ $bed->occupied ? 'badge-warning' : 'badge-success' }}">{{ $bed->occupied ? 'Occupied' : 'Free' }}</span>
          </td>
          <td>
            @if ($bed->patient)
              <a href="/patients/{{ $bed->patient->id }}">{{ $bed->patient->full_name }}</a>
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@else
  <p class="text-muted">No beds yet.</p>
@endif
<a href="/assign/assign-bed-to-patient" class="btn btn-outline-primary btn-sm">Move patient to a bed</a>
@endsection
