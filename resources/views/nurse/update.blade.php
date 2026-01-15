@extends('layouts.layout')

@section('content')

<form action="{{ route('nurses.update', ['nurse' => $nurse->id]) }}" method="POST">
    @method('PUT')
    @csrf
    <div>
        <label for="nurse_id">Nurse:</label>
        <select name="nurse_id" id="nurse_id">
            @foreach($nurses as $nurse)
                <option value="{{ $nurse->id }}">{{ $nurse->id }}: {{ $nurse->first_name }} {{ $nurse->last_name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name', $nurse->first_name) }}">
        @error('first_name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name', $nurse->last_name) }}">
        @error('last_name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="email">email:</label>
        <input type="text" name="email" id="email" class="form-control" value="{{ old('email', $nurse->email) }}">
        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Add more form fields for other nurse information -->

    <button type="submit" class="btn btn-primary">Update</button>
</form>


@endsection