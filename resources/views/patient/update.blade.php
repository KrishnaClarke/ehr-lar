@extends('layouts.layout')

@section('title', 'Edit patient')

@section('content')
<h1>Edit patient</h1>

<form action="{{ route('patients.update', ['patient' => $patient->id]) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="first_name">First name</label>
    <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name', $patient->first_name) }}" required>
  </div>
  <div class="form-group">
    <label for="last_name">Last name</label>
    <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name', $patient->last_name) }}" required>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $patient->email) }}" required>
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
  <a href="/patients/{{ $patient->id }}" class="btn btn-outline-secondary">Cancel</a>
</form>
@endsection
