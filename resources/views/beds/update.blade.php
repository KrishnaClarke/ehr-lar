@extends('layouts.layout')

@section('content')

<form action="{{ route('beds.update', ['bed' => $bed->id]) }}" method="POST">
    @method('PUT')
    @csrf

    <div class="form-group">
        <label for="patient_id">Assign Patient:</label>
        <select name="patient_id" id="patient_id" class="form-control">
            <option value="">Select a patient</option>
            @foreach ($patients as $patient)
                <option value="{{ $patient->id }}">{{ $patient->id }}: {{ $patient->first_name }} {{ $patient->last_name }}</option>
            @endforeach
        </select>
        @error('patient_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>


@endsection