<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Doctor;
use App\Models\Hospital;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::orderBy('last_name')->orderBy('first_name')->get();

        return view('doctors.index', compact('doctors'));
    }

    public function create()
    {
        return view('doctors.create');
    }

    public function store(StoreDoctorRequest $request)
    {
        $doctor = Doctor::create($request->validated() + ['hospital_id' => Hospital::query()->value('id')]);

        return redirect("/doctors/{$doctor->id}")->with('success', 'Doctor added.');
    }

    public function show(Doctor $doctor)
    {
        $patients = $doctor->patients()->orderByPivot('active', 'desc')->get();

        return view('doctors.show', compact('doctor', 'patients'));
    }

    public function edit(Doctor $doctor)
    {
        return view('doctors.update', compact('doctor'));
    }

    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        $doctor->update($request->validated());

        return redirect("/doctors/{$doctor->id}")->with('success', 'Doctor updated.');
    }

    public function destroy(Doctor $doctor)
    {
        if ($doctor->patients()->exists()) {
            return back()->with('error', 'This doctor has assignment history and cannot be deleted.');
        }

        $doctor->delete();

        return redirect('/doctors')->with('success', 'Doctor deleted.');
    }
}
