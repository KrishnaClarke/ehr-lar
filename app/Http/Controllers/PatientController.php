<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Patient;
use App\Services\PatientFlow;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function __construct(private PatientFlow $flow)
    {
    }

    public function index(Request $request)
    {
        $status = in_array($request->query('status'), ['admitted', 'discharged', 'all'], true)
            ? $request->query('status')
            : 'admitted';

        $query = Patient::with(['bed.ward'])->orderBy('last_name')->orderBy('first_name');

        if ($status === 'admitted') {
            $query->admitted();
        } elseif ($status === 'discharged') {
            $query->whereDoesntHave('records', fn ($q) => $q->whereNull('date_of_release'));
        }

        return view('patient.index', [
            'patients' => $query->paginate(20)->withQueryString(),
            'status' => $status,
        ]);
    }

    public function create()
    {
        return view('patient.create');
    }

    public function store(StorePatientRequest $request)
    {
        $patient = $this->flow->admit($request->validated());
        $patient->load('bed.ward');

        return redirect("/patients/{$patient->id}")->with(
            'success',
            "Patient admitted to bed {$patient->bed->id} in {$patient->bed->ward->name}."
        );
    }

    public function show(Patient $patient)
    {
        $patient->load(['bed.ward', 'doctors', 'nurses', 'records']);

        return view('patient.show', [
            'patient' => $patient,
            'admitted' => $patient->isAdmitted(),
        ]);
    }

    public function edit(Patient $patient)
    {
        return view('patient.update', compact('patient'));
    }

    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        $patient->update($request->validated());

        return redirect("/patients/{$patient->id}")->with('success', 'Patient updated.');
    }

    public function discharge(Patient $patient)
    {
        $this->flow->discharge($patient);

        return redirect('/patients')->with('success', "{$patient->full_name} was discharged. Their record has been kept.");
    }
}
