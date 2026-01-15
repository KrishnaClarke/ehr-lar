@extends('layouts.layout')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<a href ="/patients/create" class="btn btn-primary mt-3 wow zoomIn">Add new Patient</a>
@if($patients->count() > 0)
        <table>
                <thead>
                    <tr>
                        <th>Patient ID</th>
                        <th>First name</th>
                        <th>Last Name</th>
                        <th>Date of Birth</th>
                        <th>Email</th>
                        
                    </tr>
                </thead>
                <tbody>
                @foreach($patients as $patient)
                     <tr>
                        <td><a href="/patients/{{ $patient->id }}">{{ $patient->id }}</a></td>
                        <td>{{$patient->first_name}}</td>
                        <td>{{$patient->last_name}}</td>
                        <td>{{$patient->date_of_birth}}</td>
                        <td>{{$patient->email}}</td>
                    
                       
                    </tr>
                @endforeach
                 </tbody>
        </table>
        @else
    <p>No data available</p>
        @endif
        <a href="/assign/assign-doctor" class="btn btn-primary mt-3 wow zoomIn">assign doctor to patient</a>
    <a href="/assign/assign-nurse-to-patient" class="btn btn-primary mt-3 wow zoomIn">assign nurse to patient</a>
    <a href="/assign/assign-bed-to-patient" class="btn btn-primary mt-3 wow zoomIn">assign patient to bed</a>

        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@endsection