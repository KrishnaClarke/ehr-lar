@extends('layouts.layout')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<a href ="/nurses/create" class="btn btn-primary mt-3 wow zoomIn">Add new Nurse</a>
@if($nurses->count() > 0)
    <table>
        <thead>
            <tr>
                <th>Nurse's ID</th>
                <th>First name</th>
                <th>Last Name</th>
                <th>Date of birth</th>
                <th>Email</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($nurses as $nurse)
                <tr>
                    <td><a href="/nurses/{{ $nurse->id }}">{{ $nurse->id }}</a></td>
                    <td>{{ $nurse->first_name }}</td>
                    <td>{{ $nurse->last_name }}</td>
                    <td>{{ $nurse->date_of_birth }}</td>
                    <td>{{ $nurse->email }}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No data available</p>
@endif


<a href="/assign/assign-nurse-to-patient" class="btn btn-primary mt-3 wow zoomIn">assign nurse to patient</a>




@endsection