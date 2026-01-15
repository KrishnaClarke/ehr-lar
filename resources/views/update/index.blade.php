
@extends('layouts.layout')

@section('content')

<h1>Update</h1>

<a href="/update/update-nurse" class="btn btn-primary mt-3 wow zoomIn">update nurse to patient</a>
<a href="/update/update-doc" class="btn btn-primary mt-3 wow zoomIn">update patient to doctor</a>

<a href="/update/update-bed" class="btn btn-primary mt-3 wow zoomIn">update patient to bed</a>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif



@endsection