@extends('layouts.layout')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<a href ="/doctors/create" class="btn btn-primary mt-3 wow zoomIn">Add new Doctor</a>
@if($doctors->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Doctor's ID</th>
                    <th>First name</th>
                    <th>Last Name</th>
                    <th>Date of birth</th>
                    <th>Email</th>
                    
                </tr>  
            </thead>
            <tbody>
            @foreach($doctors as $doctor)
                <tr>
                    <td><a href="/doctors/{{ $doctor->id }}">{{ $doctor->id }}</a></td>
                    <td>{{$doctor->first_name}}</td>
                    <td>{{$doctor->last_name}}</td>
                    <td>{{$doctor->date_of_birth}}</td>
                    <td>{{$doctor->email}}</td>
                    
                </tr>    
             @endforeach
            </tbody>
        </table>
        @else
    <p>No data available</p>
        @endif
        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="/assign/assign-doctor" class="btn btn-primary mt-3 wow zoomIn">assign doctor to patient</a>

@endsection