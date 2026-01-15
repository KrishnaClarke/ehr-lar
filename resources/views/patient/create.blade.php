@extends('layouts.layout')

@section('content')
<div>
  <h1>Create a New Patient</h1>
  <form  class="main-form" action="/patients" method="POST">

  @csrf


  <div class="row mt-5 ">
        <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
          <label for="first_name">Patient first name:</label>
          <input type="text" class="form-control" name="first_name" id="first_name" required>
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInRight">
          <label for="last_name">Patient last name:</label>
          <input type="text"  class="form-control" name="last_name" id="last_name" required>
        </div>
        <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <label for="date_of_birth">Patient Date of Birth:</label>
          <input type="text"  class="form-control" name="date_of_birth" id="date_of_birth" placeholder="yyyy-mm-dd" required>
        </div>
        <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <label for="email">Patient email:</label>
          <input type="text"  class="form-control" name="email" id="email" required>
        </div>
       
    </div>
   
    <input type="submit" value="add new patient">
  </form>


  
  <a href="/patients" class="btn btn-primary mt-3 wow zoomIn"><- Back to all Patient </a>

@endsection