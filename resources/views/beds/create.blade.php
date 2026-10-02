@extends('layouts.layout')

@section('title', 'Add bed')

@section('content')
<h1>Add a bed</h1>

<form action="/beds" method="POST" class="main-form">
  @csrf
  <div class="form-group mt-4">
    <label for="ward_id">Ward</label>
    <select name="ward_id" id="ward_id" class="form-control" required>
      @foreach ($wards as $ward)
        <option value="{{ $ward->id }}" @selected((int) old('ward_id') === $ward->id)>{{ $ward->name }}</option>
      @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Add bed</button>
  <a href="/beds" class="btn btn-outline-secondary">Cancel</a>
</form>
@endsection
