<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNurseRequest;
use App\Http\Requests\UpdateNurseRequest;
use App\Models\Nurse;
use App\Models\Doctor;
use App\Models\Patient;

class NurseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all nurses from the database
        $nurses = Nurse::all();

        // Return the nurses view with the retrieved nurses
        return view('nurse.index', compact('nurses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the create nurse view
        return view('nurse.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNurseRequest $request)
    {
        // Create a new nurse instance with the validated data
        $nurse = new Nurse();
        $nurse->hospital_id = 1;
        $nurse->first_name = $request->input('first_name');
        $nurse->last_name = $request->input('last_name');
        $nurse->date_of_birth = $request->input('date_of_birth');
        $nurse->email = $request->input('email');

        // Save the nurse to the database
        $nurse->save();

        // Redirect to the nurses index page with a success message
        return redirect('/nurses')->with('success', 'Nurse created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $nurse = Nurse::findOrFail($id);
        $patients = $nurse->patients()->with('doctors')->get();
        $commonNurses = $nurse->commonDoctors()->with('nurses')->get();

    return view('nurse.show', compact('nurse', 'patients', 'commonNurses'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nurse $nurse)
    {
        // Return the edit nurse view with the specified nurse
        return view('nurse.edit', compact('nurse'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNurseRequest $request, Nurse $nurse)
    {
        // Update the nurse with the validated data
        
        $nurse->first_name = $request->input('first_name');
        $nurse->last_name = $request->input('last_name');
       
        $nurse->email = $request->input('email');
       

        // Save the updated nurse to the database
        $nurse->save();

        // Redirect to the nurses index page with a success message
        return redirect('/nurses')->with('success', 'Nurse updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nurse $nurse)
    {
        // Delete the specified nurse from the database
        $nurse->delete();

        // Redirect to the nurses index page with a success message
        return redirect('/nurses')->with('success', 'Nurse deleted successfully.');
    }
}
