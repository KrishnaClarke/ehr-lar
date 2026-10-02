@extends('layouts.layout')

@section('title', 'Nurses')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="mb-0">Nurses</h1>
  <a href="/nurses/create" class="btn btn-primary">Add nurse</a>
</div>

@if ($nurses->count())
  <table class="table table-striped table-sm">
    <thead><tr><th>ID</th><th>Name</th><th>Date of birth</th><th>Email</th></tr></thead>
    <tbody>
      @foreach ($nurses as $nurse)
        <tr>
          <td><a href="/nurses/{{ $nurse->id }}">{{ $nurse->id }}</a></td>
          <td><a href="/nurses/{{ $nurse->id }}">{{ $nurse->last_name }}, {{ $nurse->first_name }}</a></td>
          <td>{{ $nurse->date_of_birth }}</td>
          <td>{{ $nurse->email }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@else
  <p class="text-muted">None yet.</p>
@endif
<a href="/assign/assign-nurse-to-patient" class="btn btn-outline-primary btn-sm">Assign nurse to patient</a>
@endsection
