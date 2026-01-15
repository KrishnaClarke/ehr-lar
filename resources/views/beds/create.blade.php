@extends('layouts.layout')

@section('content')

<div >
  <h1>Create a New Bed</h1>
  <form class="main-form" action="/beds" method="POST">
  @csrf
        
         
  <div>
        <label for="ward_id">Ward:</label>
        <select name="ward_id" id="ward_id">
            @foreach($wards as $ward)
                <option value="{{ $ward->id }}">{{ $ward->id }}: {{ $ward->name }}</option>
            @endforeach
        </select>
    </div>




        
    <input type="submit" value="add new bed" >
  </form>


  <a href="/beds"  class="btn btn-primary mt-3 wow zoomIn"><- Back to all beds </a>

@endsection