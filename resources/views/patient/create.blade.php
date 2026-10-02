@extends('layouts.layout')

@section('title', 'Admit patient')

@section('content')
<h1>Admit a new patient</h1>
<p class="text-muted">The patient is placed in the first available bed.</p>

<form action="/patients" method="POST" class="main-form">
  @csrf
  <div class="row mt-4">
    <div class="col-12 col-sm-6 py-2">
      <label for="first_name">First name</label>
      <input type="text" class="form-control" name="first_name" id="first_name" value="{{ old('first_name') }}" required>
    </div>
    <div class="col-12 col-sm-6 py-2">
      <label for="last_name">Last name</label>
      <input type="text" class="form-control" name="last_name" id="last_name" value="{{ old('last_name') }}" required>
    </div>
    <div class="col-12 col-sm-6 py-2">
      <label for="date_of_birth">Date of birth</label>
      <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}" max="{{ now()->subDay()->toDateString() }}" required>
    </div>
    <div class="col-12 col-sm-6 py-2">
      <label for="email">Email</label>
      <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required>
    </div>
  </div>
  <button type="submit" class="btn btn-primary mt-3">Admit patient</button>
  <a href="/patients" class="btn btn-outline-secondary mt-3">Cancel</a>
</form>
@endsection
