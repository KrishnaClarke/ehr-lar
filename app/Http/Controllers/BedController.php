<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBedRequest;
use App\Models\Bed;
use App\Models\PatientRecord;
use App\Models\Ward;

class BedController extends Controller
{
    public function index()
    {
        $beds = Bed::with(['ward', 'patient'])->orderBy('ward_id')->orderBy('id')->get();

        return view('beds.index', compact('beds'));
    }

    public function create()
    {
        return view('beds.create', ['wards' => Ward::orderBy('name')->get()]);
    }

    public function store(StoreBedRequest $request)
    {
        Bed::create($request->validated());

        return redirect('/beds')->with('success', 'Bed added.');
    }

    public function show(Bed $bed)
    {
        $bed->load(['ward', 'patient']);

        return view('beds.show', ['bed' => $bed, 'patient' => $bed->patient]);
    }

    public function destroy(Bed $bed)
    {
        if ($bed->occupied || PatientRecord::where('bed_id', $bed->id)->exists()) {
            return back()->with('error', 'This bed is occupied or has admission history, so it cannot be removed.');
        }

        $bed->delete();

        return redirect('/beds')->with('success', 'Bed removed.');
    }
}
