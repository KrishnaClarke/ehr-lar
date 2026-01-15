

@extends('layouts.layout')

@section('content')

<h1>Assign Doctor to Patient</h1>

<form action="{{ route('assign-doctor-submit') }}" method="POST">
   @csrf
        <label for="doctor_id">Select Doctor:</label>
        <select name="doctor_id" id="doctor_id">
            @foreach ($doctors as $doctor)
                <option value="{{ $doctor->id }}">{{ $doctor->id }}: {{ $doctor->first_name }} {{ $doctor->last_name }}</option>
            @endforeach
        </select>
        <br><br>
        <label for="patient_id">Select Patient:</label>
        <select name="patient_id" id="patient_id">
            @foreach ($patients as $patient)
                <option value="{{ $patient->id }}">{{ $patient->id }}: {{ $patient->first_name }} {{ $patient->last_name }}</option>
            @endforeach
        </select>
        <br><br>
        <div>
                <label for="active">Active:</label>
                <input type="text" name="active" id="active" >
        </div>
        <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <label for="disease">Disease:</label>
            <input type="text" name="disease" id="disease">
            <br><br>
        </div>

        <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <label for="date_assigned">Date Assigned:</label>
            <input type="date" name="date_assigned" id="date_assigned" placeholder="yyyy-mm-dd" required>
            <br><br>
        </div>
        <button type="submit"> Doctor to Patient</button>
    </form>


@endsection