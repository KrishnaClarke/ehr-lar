@extends('layouts.layout')

@section('title', 'Free a bed')

@section('content')
<h1>Free a bed</h1>
<p class="text-muted">The patient stays admitted but no longer has a bed.</p>

<form action="{{ route('update-bed-submit') }}" method="POST">
  @csrf
  <div class="form-group">
    <label for="bed_id">Occupied bed</label>
    <select name="bed_id" id="bed_id" class="form-control" required>
      @forelse ($beds as $bed)
        <option value="{{ $bed->id }}">{{ $bed->ward->name }} &middot; bed {{ $bed->id }} &ndash; {{ optional($bed->patient)->full_name }}</option>
      @empty
        <option value="" disabled selected>No occupied beds</option>
      @endforelse
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Free bed</button>
</form>
@endsection
