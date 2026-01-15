



@extends('layouts.layout')

@section('content')

<h1>Statistics</h1>

<p>Total Doctors: {{ $doctorCount }}</p>
<p>Total Patients: {{ $patientCount }}</p>
<p>Total Nurse: {{ $nursesCount }}</p>
<p>Beds: {{ $availableBeds }}</p>

<h1>Update</h1>

<a href="/update/update-nurse" class="btn btn-primary mt-3 wow zoomIn">update nurse to patient</a>
<a href="/update/update-doc" class="btn btn-primary mt-3 wow zoomIn">update patient to doctor</a>

<a href="/update/update-bed" class="btn btn-primary mt-3 wow zoomIn">update patient to bed</a>


<h1>Option for assignment</h1>
<a href="/assign/assign-patient" class="btn btn-primary mt-3 wow zoomIn">assign Patient to Doctor</a>
<a href="/assign/assign-doctor" class="btn btn-primary mt-3 wow zoomIn">assign doctor to patient</a>


<a href="/assign/assign-nurse-to-patient" class="btn btn-primary mt-3 wow zoomIn">assign nurse to patient</a>
<a href="/assign/assign-patient-to-nurse" class="btn btn-primary mt-3 wow zoomIn">assign patient to nurse</a>

<a href="/assign/assign-bed-to-patient" class="btn btn-primary mt-3 wow zoomIn">assign patient to bed</a>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif



@endsection


