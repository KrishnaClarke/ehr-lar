<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Doctor;
use App\Models\Patient;



class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $doctors = Doctor::all();
      
        return view('doctors.index', compact( 'doctors') ); 
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDoctorRequest $request)
    {
        //
        $doctors = new Doctor();
        $doctors->hospital_id = 1;
        $doctors->first_name = request('first_name');
        $doctors->last_name = request('last_name');
        $doctors->date_of_birth = request('date_of_birth');
        $doctors->email = request('email');

        $doctors->save();
 
        return redirect('/doctors')->with('mssg', 'Thanks for adding a new doctor');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        //$doctor = Doctor::findOrFail($id);
        //$patients = $doctor->patients;

        $doctor = Doctor::findOrFail($id);
        $patients = $doctor->patients;
        return view('doctors.show', compact('patients', 'doctor'));

            
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        //
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string',
           
        ]);

        $doctor->update($validatedData);

        // Redirect back or to a specific route
        return redirect()->back()->with('success', 'Doctor information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor, $id)
    {
        //

        $doctor = Doctor::findOrFail($id);

    // Check if the doctor has any patients
    if ($doctor->patients()->exists()) {
        return redirect()->back()->with('error', 'Cannot delete doctor. Doctor has assigned patients.');
    }

    $doctor->delete();

  
  return redirect('/doctors')->with('success', 'Doctor deleted successfully.');
    }
}
