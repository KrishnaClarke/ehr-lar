@extends('layouts.layout')

@section('content')

<form action="{{ route('patients.update', ['patient' => $patient->id]) }}" method="POST">
    @method('PUT')
    @csrf
    <div>
        <label for="patient_id">patient:</label>
        <select name="patient_id" id="patient_id">
            @foreach($patients as $patient)
                <option value="{{ $patient->id }}">{{ $patient->id }}: {{ $patient->first_name }} {{ $patient->last_name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name', $patient->first_name) }}">
        @error('first_name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name', $patient->last_name) }}">
        @error('last_name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="email">email:</label>
        <input type="text" name="email" id="email" class="form-control" value="{{ old('email', $patient->email) }}">
        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Add more form fields for other patient information -->

    <button type="submit" class="btn btn-primary">Update</button>
</form>


@endsection