@extends('layouts.layout')

@section('title', 'EHR Demo')

@section('content')
<div class="text-center py-5">
  <h1 class="display-4">EHR-Health</h1>
  <p class="lead">A small electronic health records system: admit patients, place them in beds,
    assign doctors and nurses, and discharge them while keeping the history.</p>
  <a href="/statistics" class="btn btn-primary mr-2">Open the dashboard</a>
  <a href="/patients" class="btn btn-outline-primary">View patients</a>
  <p class="text-muted mt-4 mb-0">Staff pages ask for the login configured in <code>.env</code>.</p>
</div>

<div class="row text-center">
  <div class="col-md-4 py-3">
    <h5>Admission &amp; beds</h5>
    <p>New patients are placed in the first free bed. Beds can never be double-booked.</p>
  </div>
  <div class="col-md-4 py-3">
    <h5>Care teams</h5>
    <p>Doctors and nurses are assigned with dates, and every assignment keeps its history.</p>
  </div>
  <div class="col-md-4 py-3">
    <h5>Discharge, not delete</h5>
    <p>Discharging closes the admission and frees the bed. Records are never destroyed.</p>
  </div>
</div>
@endsection
