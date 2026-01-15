<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Nurse;
use App\Models\NursePatient;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientToNurseController extends Controller
{
    //
    public function show(){
        $patients = Patient::all(); // Fetch all patients from your data source
        $nurses = Nurse::all(); // Fetch all nurses from your data source
    
        return view('update.update-nurse', compact('patients', 'nurses'));
    }
    public function update(Request $request)
    {
        
            // Retrieve the form data
            $patientId = $request->input('patient_id');
            $nurseId = $request->input('nurse_id');
            $active = $request->has('active');
            $dateUnassigned = $request->input('date_unassigned');
    
            // Perform the update logic here
            $nursePatient = NursePatient::where('patient_id', $patientId)->where('nurse_id', $nurseId)->first();
            if ($nursePatient) {
                $nursePatient->active = $active;
                $nursePatient->date_unassigned = $dateUnassigned;
                $nursePatient->save();
            }
    
            // Redirect to a success page or do something else
                return redirect('/patients')->with('success', 'Successfully unassigned patient from nurse.');
        // Retrieve the form data
       // $patientId = $request->input('patient_id');
        //$nurseId = $request->input('nurse_id');
        //$active = $request->has('active');
        //$dateUnassigned = $request->input('date_unassigned');

        // Perform the update logic here

        // Redirect to a success page or do something else
       // return redirect()->route('/patients');
    }
}
