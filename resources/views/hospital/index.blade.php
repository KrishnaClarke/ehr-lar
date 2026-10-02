@extends('layouts.layout')

@section('title', 'Dashboard')

@section('content')
<h1 class="mb-4">Hospital dashboard</h1>

<div class="row text-center mb-4">
  <div class="col-6 col-md-3 mb-3"><div class="card p-3"><div class="text-muted">Admitted patients</div><h2>{{ $patientCount }}</h2></div></div>
  <div class="col-6 col-md-3 mb-3"><div class="card p-3"><div class="text-muted">Doctors</div><h2>{{ $doctorCount }}</h2></div></div>
  <div class="col-6 col-md-3 mb-3"><div class="card p-3"><div class="text-muted">Nurses</div><h2>{{ $nursesCount }}</h2></div></div>
  <div class="col-6 col-md-3 mb-3"><div class="card p-3"><div class="text-muted">Beds free</div><h2>{{ $availableBeds }} / {{ $totalBeds }}</h2></div></div>
</div>

<p>Overall occupancy: <strong>{{ $occupancy }}%</strong> &middot; Discharged patients on record: <strong>{{ $dischargedCount }}</strong></p>

<h3 class="mt-4">Occupancy by ward</h3>
<table class="table table-sm">
  <thead><tr><th>Ward</th><th>Occupied</th><th>Beds</th><th style="width:40%">Usage</th></tr></thead>
  <tbody>
    @foreach ($wards as $ward)
      @php($pct = $ward->beds_count ? round($ward->occupied_beds_count / $ward->beds_count * 100) : 0)
      <tr>
        <td>{{ $ward->name }}</td>
        <td>{{ $ward->occupied_beds_count }}</td>
        <td>{{ $ward->beds_count }}</td>
        <td>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width: {{ $pct }}%">{{ $pct }}%</div></div>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

<h3 class="mt-4">Quick actions</h3>
<a href="/patients/create" class="btn btn-primary btn-sm mb-2">Admit a patient</a>
<a href="/assign/assign-doctor" class="btn btn-outline-primary btn-sm mb-2">Assign doctor</a>
<a href="/assign/assign-nurse-to-patient" class="btn btn-outline-primary btn-sm mb-2">Assign nurse</a>
<a href="/assign/assign-bed-to-patient" class="btn btn-outline-primary btn-sm mb-2">Move patient to bed</a>
<a href="/updates" class="btn btn-outline-secondary btn-sm mb-2">Unassign / free a bed</a>
@endsection
