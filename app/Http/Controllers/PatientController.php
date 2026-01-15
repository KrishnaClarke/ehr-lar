<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Nurse;
use App\Models\Ward;
use App\Models\PatientRecord;


class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all patients from the database
        $patients = Patient::all();

        // Return the patients index view with the retrieved patients
        return view('patient.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the create patient view
        return view('patient.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientRequest $request)
    {
        // Create a new patient instance with the validated data
        $patient = new Patient();
        $patient->hospital_id = 1;
        $patient->first_name = $request->input('first_name');
        $patient->last_name = $request->input('last_name');
        $patient->date_of_birth = $request->input('date_of_birth');
        $patient->email = $request->input('email');

        // Save the patient to the database
        $patient->save();

       // Create a patient record for the newly created patient
        $patientRecord = new PatientRecord();
        $patientRecord->hospital_id = 1;
        $patientRecord->patient_id = $patient->id;
        $patientRecord->bed_id = 1;
        $patientRecord->date_of_admission = Carbon::now(); // Set the current date and time
        $patientRecord->save();

        // Redirect to the patients index page with a success message
        return redirect('/patients')->with('success', 'Patient created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
       // Retrieve the specified patient with related doctor and nurses
      // Retrieve the specified patient with related doctor and nurses
      $patient = Patient::findOrFail($id);

        $doctors = $patient->doctors;
        $nurses = $patient->nurses;
        $ward = $patient->ward;

        // Return the show patient view with the specified patient, doctors, nurses, and ward
        return view('patient.show', compact('patient', 'doctors', 'nurses', 'ward'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        // Return the edit patient view with the specified patient
        return view('patient.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        // Update the patient with the validated data
        $patient->first_name = $request->input('first_name');
        $patient->last_name = $request->input('last_name');
       
        $patient->email = $request->input('email');
       
        // Save the updated patient to the database
        $patient->save();

        // Redirect to the patients index page with a success message
        return redirect('/patients')->with('success', 'Patient updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the specified patient
    $patient = Patient::findOrFail($id);

    // Retrieve the patient record associated with the patient
    $patientRecord = $patient->latestRecord;

    if ($patientRecord) {
        // Update the patient record fields
        $patientRecord->date_of_release = Carbon::now();

        // Save the updated patient record
        $patientRecord->save();
    } else {
        // Create a new patient record
        $patientRecord = new PatientRecord();
        $patientRecord->hospital_id = $patient->hospital_id; // Use the correct hospital_id from the patient
        $patientRecord->bed_id = $patient->bed_id;
        $patientRecord->patient_id = $patient->id;

        // Set other required fields here
        $patientRecord->date_of_admission = Carbon::now(); // Set the current date and time
        $patientRecord->date_of_release = Carbon::now();

        $patientRecord->save();
    }

    // Discharge the patient
    $patient->discharge();

    // Delete the patient record from the database
    $patient->records()->delete();

    // Delete the patient from the database
    $patient->delete();
        // Redirect to the patients index page
        return redirect('/patients')->with('success', 'Patient discharged successfully.');
    }
}
