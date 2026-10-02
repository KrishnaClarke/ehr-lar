@extends('layouts.layout')

@section('title', 'Unassign')

@section('content')
<h1>Unassign</h1>
<p class="text-muted">End a care assignment or free a bed. History is kept.</p>
<a href="/update/update-doc" class="btn btn-outline-primary mb-2">Unassign a doctor from a patient</a>
<a href="/update/update-nurse" class="btn btn-outline-primary mb-2">Unassign a nurse from a patient</a>
<a href="/update/update-bed" class="btn btn-outline-primary mb-2">Free a bed</a>
@endsection
