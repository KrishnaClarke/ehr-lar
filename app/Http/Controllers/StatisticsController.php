<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Bed;
use App\Models\Nurse;

class StatisticsController extends Controller
{
    public function index()
    {
        // Count doctors
        $doctorCount = Doctor::count();

        // Count patients
        $patientCount = Patient::count();
        
        // Count nurses
        $nursesCount = Nurse::count();
       
        // Count available beds
        $availableBeds = Bed::count();
      

        return view('hospital.index', [
            'doctorCount' => $doctorCount,
            'patientCount' => $patientCount,
            'nursesCount' => $nursesCount,
            'availableBeds' => $availableBeds,
         
        ]);
    }
}
