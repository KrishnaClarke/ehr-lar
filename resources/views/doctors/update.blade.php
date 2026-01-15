@extends('layouts.layout')

@section('content')

<form action="{{ route('doctors.update', ['doctor' => $doctor->id]) }}" method="POST">
    @method('PUT')
    @csrf
    <div>
        <label for="doctor_id">Doctor:</label>
        <select name="doctor_id" id="doctor_id">
            @foreach($doctors as $doctor)
                <option value="{{ $doctor->id }}">{{ $doctor->id }}: {{ $doctor->first_name }} {{ $doctor->last_name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name', $doctor->first_name) }}">
        @error('first_name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name', $doctor->last_name) }}">
        @error('last_name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="email">email:</label>
        <input type="text" name="email" id="email" class="form-control" value="{{ old('email', $doctor->email) }}">
        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Add more form fields for other doctor information -->

    <button type="submit" class="btn btn-primary">Update</button>
</form>


@endsection