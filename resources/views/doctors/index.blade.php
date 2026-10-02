@extends('layouts.layout')

@section('title', 'Doctors')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="mb-0">Doctors</h1>
  <a href="/doctors/create" class="btn btn-primary">Add doctor</a>
</div>

@if ($doctors->count())
  <table class="table table-striped table-sm">
    <thead><tr><th>ID</th><th>Name</th><th>Date of birth</th><th>Email</th></tr></thead>
    <tbody>
      @foreach ($doctors as $doctor)
        <tr>
          <td><a href="/doctors/{{ $doctor->id }}">{{ $doctor->id }}</a></td>
          <td><a href="/doctors/{{ $doctor->id }}">{{ $doctor->last_name }}, {{ $doctor->first_name }}</a></td>
          <td>{{ $doctor->date_of_birth }}</td>
          <td>{{ $doctor->email }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@else
  <p class="text-muted">None yet.</p>
@endif
<a href="/assign/assign-doctor" class="btn btn-outline-primary btn-sm">Assign doctor to patient</a>
@endsection
