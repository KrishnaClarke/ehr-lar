@extends('layouts.layout')

@section('content')
    <div>
                <h1>Doctor's Name - {{ $doctor->first_name }} {{ $doctor->last_name }}</h1>
                    <p class="text-xl mb-0">Date of Birth - {{ $doctor->date_of_birth }}</p>
                    <p class="text-xl mb-0">Email - {{ $doctor->email }}</p>

                    <h2>Assigned Patients:</h2>
                    <ul>
                        @foreach ($patients as $patient)
                            <li>{{ $patient->id }}: {{ $patient->first_name }} {{ $patient->last_name }}</li>
                        @endforeach
                    </ul>

                    <form action="/doctors/{{ $doctor->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Retired/Dismissal Doctor</button>
                    </form>
    </div>

    <a href="/doctors" class="btn btn-primary mt-3 wow zoomIn"><- Back to all Doctors </a>
    <a href="/beds/{bed}" class="btn btn-primary mt-3 wow zoomIn">Update Doctor</a>
@endsection
