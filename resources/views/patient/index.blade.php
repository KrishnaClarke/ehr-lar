@extends('layouts.layout')

@section('title', 'Patients')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="mb-0">Patients</h1>
  <a href="/patients/create" class="btn btn-primary">Admit new patient</a>
</div>

<ul class="nav nav-pills mb-3">
  @foreach (['admitted' => 'Admitted', 'discharged' => 'Discharged', 'all' => 'All'] as $key => $label)
    <li class="nav-item"><a class="nav-link {{ $status === $key ? 'active' : '' }}" href="/patients?status={{ $key }}">{{ $label }}</a></li>
  @endforeach
</ul>

@if ($patients->count())
  <table class="table table-striped table-sm">
    <thead>
      <tr><th>ID</th><th>Name</th><th>Date of birth</th><th>Email</th><th>Ward / bed</th></tr>
    </thead>
    <tbody>
      @foreach ($patients as $patient)
        <tr>
          <td><a href="/patients/{{ $patient->id }}">{{ $patient->id }}</a></td>
          <td><a href="/patients/{{ $patient->id }}">{{ $patient->last_name }}, {{ $patient->first_name }}</a></td>
          <td>{{ $patient->date_of_birth }}</td>
          <td>{{ $patient->email }}</td>
          <td>
            @if ($patient->bed)
              {{ $patient->bed->ward->name }} &middot; bed {{ $patient->bed->id }}
            @else
              <span class="text-muted">&ndash;</span>
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{ $patients->links() }}
@else
  <p class="text-muted">No patients to show.</p>
@endif
@endsection
