<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBedRequest;
use App\Http\Requests\UpdateBedRequest;
use App\Models\Bed;
use App\Models\Patient;
use App\Models\Ward;

class BedController extends Controller
{


    protected $fillable = ['patient_id', 'occupied'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $beds = Bed::all();

        return view('beds.index', compact('beds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
       $patients = Patient::all();
         $wards = Ward::all();
        return view('beds.create', compact('patients', 'wards'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBedRequest $request)
    {
        //
        $bed = new Bed();
       
        $bed->ward_id = $request->input('ward_id');
        $bed->save();

        return redirect('/beds')->with('success', 'Bed created successfully.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    { 
        // Retrieve the specified bed with its assigned patients
        $bed = Bed::findOrFail($id);
        $patient = $bed->patient;
    
        // Return the show bed view with the specified bed and patients
        return view('beds.show', compact('bed', 'patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bed $bed)
    {
        //
        return view('beds.edit', compact('bed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBedRequest $request, Bed $bed)
    {
        //
        $validatedData = $request->validate([
            'patient_id' => 'required|exists:patients,id',
        ]);

        $bed->update([
            'patient_id' => $validatedData['patient_id'],
        ]);


        $bed->patient_id  = $request->input('patient_id ');
        $bed->ward_id = $request->input('ward_id');
        $bed->save();

        return redirect()->route('beds.index')->with('success', 'Bed updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bed $bed)
    {
        //

        if ($bed->patients()->exists()) {
            return redirect()->back()->with('error', 'Cannot delete bed.  has Bed  assigned patients.');
        }
        $bed->delete();

        return redirect()->route('beds.index')->with('success', 'Bed deleted successfully.');
    }
}
