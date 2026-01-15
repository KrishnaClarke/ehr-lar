@extends('layouts.layout')

@section('content')
    <div>
        <h1>Nurse's Name - {{ $nurse->first_name }} {{ $nurse->last_name }}</h1>
        <p class="text-xl mb-0">Date of Birth - {{ $nurse->date_of_birth }}</p>
        <p class="text-xl mb-0">Email - {{ $nurse->email }}</p>

        <h2>Assigned Patients:</h2>
        @foreach ($patients as $patient)
            <ul>
                <li>Patient: {{ $patient->first_name }} {{ $patient->last_name }}</li>
           
                @foreach ($patient->doctors as $doctor)
                    <h3>Doctor: {{ $doctor->first_name }} {{ $doctor->last_name }}</h3>
                @endforeach
            </ul>
        @endforeach
        
      

        <h2>Nurses Working with the Same Doctor:</h2>
        <ul>
            @foreach($commonNurses as $commonNurse)
                <li>{{ $commonNurse->id }}</li>
                <li>{{ $commonNurse->first_name }}</li>
                <li>{{ $commonNurse->last_name }}</li><br>
            @endforeach
        </ul>

       
    </div>

    <!-- Display common nurses and assigned patients -->
    </div>
    <form action="/nurses/{{$nurse->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button>Retired/Dismissal Nurse</button>
    </form>
</div>

<a href="/nurses" class="btn btn-primary mt-3 wow zoomIn"><- Back to all Nurses</a>
@endsection
