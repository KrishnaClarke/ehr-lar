<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Services\PatientFlow;
use Illuminate\Http\Request;

/** Ends a doctor's assignment to a patient. */
class PatientToDoctorController extends Controller
{
    public function __construct(private PatientFlow $flow)
    {
    }

    public function index()
    {
        return view('update.index');
    }

    public function show()
    {
        return view('update.update-doc', [
            'patients' => Patient::admitted()->orderBy('last_name')->get(),
            'doctors' => Doctor::orderBy('last_name')->get(),
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'patient_id' => ['required', 'exists:patients,id'],
            'doctor_id' => ['required', 'exists:doctors,id'],
            'date_unassigned' => ['nullable', 'date'],
        ]);

        $this->flow->endDoctorAssignment(
            Doctor::findOrFail($data['doctor_id']),
            Patient::findOrFail($data['patient_id']),
            $data['date_unassigned'] ?? null,
        );

        return redirect("/patients/{$data['patient_id']}")->with('success', 'Doctor unassigned from patient.');
    }
}
