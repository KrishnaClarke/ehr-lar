<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\DoctorPatient;


class PatientToDoctorController extends Controller
{
    //
    public function index()
    {
        //
        $patients = Patient::all(); // Fetch all patients from your data source
        $doctors = Doctor::all(); // Fetch all doctors from your data source
    
        return view('update.index', compact('patients', 'doctors'));
      
    }

    public function show()
    {
        //
        $patients = Patient::all(); // Fetch all patients from your data source
        $doctors = Doctor::all(); // Fetch all doctors from your data source
    
        return view('update.update-doc', compact('patients', 'doctors'));
      
    }
    public function update(Request $request)
    {

            // Retrieve the form data
        $patientId = $request->input('patient_id');
        $doctorId = $request->input('doctor_id');
        $active = $request->has('active');
        $dateUnassigned = $request->input('date_unassigned');

        // Perform the update logic here
        $doctorPatient = DoctorPatient::where('patient_id', $patientId)->where('doctor_id', $doctorId)->first();
        if ($doctorPatient) {
            $doctorPatient->active = $active;
            $doctorPatient->date_unassigned = $dateUnassigned;
            $doctorPatient->save();
        }

        // Redirect to a success page or do something else
            return redirect('/patients')->with('success', 'Successfully unassigned patient from doctor.');
    }
        // Retrieve the form data
      /**  $patientId = $request->input('patient_id');
       * $doctorId = $request->input('doctor_id');
       * $active = $request->has('active');
      *  $dateUnassigned = $request->input('date_unassigned');
    */
        // Perform the update logic here

        // Redirect to a success page or do something else
       // return redirect('/patients')->with('success', 'Successfully unassign patient from doctor.');
    
    
}

