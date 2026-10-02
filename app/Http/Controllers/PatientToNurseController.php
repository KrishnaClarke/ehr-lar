<?php

namespace App\Http\Controllers;

use App\Models\Nurse;
use App\Models\Patient;
use App\Services\PatientFlow;
use Illuminate\Http\Request;

/** Ends a nurse's assignment to a patient. */
class PatientToNurseController extends Controller
{
    public function __construct(private PatientFlow $flow)
    {
    }

    public function show()
    {
        return view('update.update-nurse', [
            'patients' => Patient::admitted()->orderBy('last_name')->get(),
            'nurses' => Nurse::orderBy('last_name')->get(),
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'patient_id' => ['required', 'exists:patients,id'],
            'nurse_id' => ['required', 'exists:nurses,id'],
            'date_unassigned' => ['nullable', 'date'],
        ]);

        $this->flow->endNurseAssignment(
            Nurse::findOrFail($data['nurse_id']),
            Patient::findOrFail($data['patient_id']),
            $data['date_unassigned'] ?? null,
        );

        return redirect("/patients/{$data['patient_id']}")->with('success', 'Nurse unassigned from patient.');
    }
}
