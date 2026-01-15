<?php

namespace App\Http\Controllers;
use App\Models\Bed;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Nurse;
use App\Models\DoctorPatient;
use App\Models\NursePatient;

use App\Models\Ward;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    //
    public function showAssignPatientForm()
    {
        $doctors = Doctor::all();
        $patients = Patient::all();

        return view('assign.assign-patient', compact('doctors', 'patients'));
    }

    public function showAssignDoctorForm()
    {
        $doctors = Doctor::all();
        $patients = Patient::all();

        return view('assign.assign-doctor', compact('doctors', 'patients'));
    }

    public function showAssignNurseToPatientForm()
    {
        $nurses = Nurse::all();
        $patients = Patient::all();

        return view('assign.assign-nurse-to-patient', compact('nurses', 'patients'));
    }

  /**   public function showAssignPatientToNurseForm()
    *{
      *  $patients = Patient::all();
     *   $beds = Bed::all();
    *    return view('assign.bed-to-patient', compact('patients', 'beds'));
   * }
    */
    public function showAssignBedToPatient(){
      //  $wards = Ward::all(); // Assuming you have a Ward model and table
        $patients = Patient::all(); // Assuming you have a Patient model and table
        $beds = Bed::all();
        return view('assign.bed-to-patient', compact( 'patients','beds'));
    }

     /**public function assignPatientToDoctor(Request $request)
    {
        $doctorId = $request->input('doctor_id');
        $patientId = $request->input('patient_id');

        $doctor = Doctor::findOrFail($doctorId);
        $patient = Patient::findOrFail($patientId);

        // Assign the doctor to the patient
        $patient->doctor_id = $doctorId;
        $patient->active = $request->input('active');
        $patient->disease = $request->input('disease');
        $patient->date_assigned = $request->input('date_assigned');
        $patient->save();
        
        return redirect('/doctors')->with('success', 'Doctor assigned to patient successfully.');
  
    }
    */
       public function assignDoctorToPatient(Request $request)
        {
          // Validate the form data
          $validatedData = $request->validate([
            'doctor_id' => 'required',
            'patient_id' => 'required',
            'active' => 'required',
            'disease' => 'required',
            'date_assigned' => 'required|date',
        ]);

        // Fetch the doctor and patient models
        $doctor = Doctor::findOrFail($validatedData['doctor_id']);
        $patient = Patient::findOrFail($validatedData['patient_id']);

        // Create a new assignment
        $assignment = new DoctorPatient();
        $assignment->doctor_id = $doctor->id;
        $assignment->patient_id = $patient->id;
        $assignment->active = $validatedData['active'];
        $assignment->disease = $validatedData['disease'];
        $assignment->date_assigned = $validatedData['date_assigned'];
        $assignment->save();

        // Redirect to a success page or do something else
        return redirect('/patients')->with('success', 'Patient assigned to doctor successfully.');
    }
    
    public function assignNurseToPatient(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'nurse_id' => 'required',
        'patient_id' => 'required',
        'active' => 'required',
        'date_assigned' => 'required|date',
    ]);
     // Fetch the nurse and patient models
     $nurse = Nurse::findOrFail($validatedData['nurse_id']);
     $patient = Patient::findOrFail($validatedData['patient_id']);

    // Create a new assignment
    $assignment = new NursePatient();
    //$assignment->nurse_id = $validatedData['nurse_id'];
    //$assignment->patient_id = $validatedData['patient_id'];
    //either or
    $assignment->nurse_id = $nurse->id;
    $assignment->patient_id = $patient->id;
    $assignment->active = $validatedData['active'];
    $assignment->date_assigned = $validatedData['date_assigned'];
    $assignment->save();

    return redirect('/patients')->with('success', 'Nurse assigned to patient successfully.');
}


   /**  public function assignPatientToNurse(Request $request)
    *{
        *$patientId = $request->input('patient_id');
        *$nurseId = $request->input('nurse_id');

       * $patient = Patient::findOrFail($patientId);
      *  $nurse = Nurse::findOrFail($nurseId);

     *   $patient->nurses()->attach($nurseId);

    *    return redirect('/nurses')->with('success', 'Patient assigned to nurse successfully.');
   * }
    */

    public function assignBedToPatient(Request $request){
        $validatedData = $request->validate([
            'bed_id' => 'required',
            'patient_id' => 'required',
            'occupied' => 'required',
        ]);
    
        $bed = Bed::findOrFail($validatedData['bed_id']);
        $patient = Patient::findOrFail($validatedData['patient_id']);
    
        // Update the bed information
        $bed->patient_id = $patient->id;
        $bed->occupied = $validatedData['occupied'];
        $bed->save();
       

       // $validatedData = $request->validate([
         //   'id' => 'required',
          //  'ward_id' => 'required',
           // 'patient_id' => 'required',
            //'occupied' => 'required',
        //]);
    
        //$bed = Bed::findOrFail($validatedData['id']);
      //  $ward = Ward::findOrFail($validatedData['ward_id']);
        //$patient = Patient::findOrFail($validatedData['patient_id']);
    
        // Update the bed information
       // $bed->ward_id = $ward->id;
      // $bed->patient_id = $patient->id;
      // $bed->occupied = $validatedData['occupied'];
      // $bed->save();
       
       /** $patientId = $request->input('patient_id');
        *$wardId = $request->input('ward_id');

        *$patient = Patient::findOrFail($patientId);
        *$nurse = Ward::findOrFail($wardId);

       * $patient->wards()->attach($wardId);
        */ 
        return redirect('/beds')->with('success', 'Patient assigned to bed successfully.');
    }

}
