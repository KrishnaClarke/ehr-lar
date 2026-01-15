<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bed;
use App\Models\Patient;

class RemovePatientFromBedController extends Controller
{
    //
    public function show(){
       $patients = Patient::all(); // Fetch all patients from your data source
       $beds = Bed::all(); // Fetch all beds from your data source
    
       return view('update.update-bed', compact('patients', 'beds'));
    }
     
    public function remove(Request $request)
    {

        
            // Retrieve the form data
            $bedId = $request->input('bed_id');
            $patientId = $request->input('patient_id');
            $occupied = $request->has('occupied');

            // Perform the remove logic here
            $bed = Bed::where('id', $bedId)->first();
            if ($bed) {
                $bed->patient_id = $patientId;
                $bed->occupied = $occupied;
                $bed->save();
            }
        // Retrieve the form data
       // $bedId = $request->input('bed_id');
        //$patientId = $request->input('patient_id');

        // Perform the remove logic here

        // Redirect to a success page or do something else
        return redirect('/patients')->with('success', 'Successfully unassigned patient from bed.');
    }
}
