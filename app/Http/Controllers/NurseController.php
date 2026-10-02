<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNurseRequest;
use App\Http\Requests\UpdateNurseRequest;
use App\Models\Hospital;
use App\Models\Nurse;

class NurseController extends Controller
{
    public function index()
    {
        $nurses = Nurse::orderBy('last_name')->orderBy('first_name')->get();

        return view('nurse.index', compact('nurses'));
    }

    public function create()
    {
        return view('nurse.create');
    }

    public function store(StoreNurseRequest $request)
    {
        $nurse = Nurse::create($request->validated() + ['hospital_id' => Hospital::query()->value('id')]);

        return redirect("/nurses/{$nurse->id}")->with('success', 'Nurse added.');
    }

    public function show(Nurse $nurse)
    {
        $patients = $nurse->activePatients()->with('activeDoctors')->get();
        $colleagues = $nurse->colleagues();

        return view('nurse.show', compact('nurse', 'patients', 'colleagues'));
    }

    public function edit(Nurse $nurse)
    {
        return view('nurse.update', compact('nurse'));
    }

    public function update(UpdateNurseRequest $request, Nurse $nurse)
    {
        $nurse->update($request->validated());

        return redirect("/nurses/{$nurse->id}")->with('success', 'Nurse updated.');
    }

    public function destroy(Nurse $nurse)
    {
        if ($nurse->patients()->exists()) {
            return back()->with('error', 'This nurse has assignment history and cannot be deleted.');
        }

        $nurse->delete();

        return redirect('/nurses')->with('success', 'Nurse deleted.');
    }
}
