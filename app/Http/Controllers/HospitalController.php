<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHospitalRequest;
use App\Http\Requests\UpdateHospitalRequest;
use App\Models\Hospital;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $hospitals = Hospital::all();
        return view('hospital.index', compact('hospitals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('hospital.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHospitalRequest $request)
    {
        //

        $hospital = new Hospital();

        // Set the attributes of the hospital object based on the request data
        $hospital->name = $request->input('name');
      

        $hospital->save();

        return redirect('/hospitals')->with('success', 'Hospital created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hospital $hospital)
    {
        //
        return view('hospital.show', compact('hospital'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hospital $hospital)
    {
        //
        return view('hospital.edit', compact('hospital'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHospitalRequest $request, Hospital $hospital)
    {
        //

        // Update the attributes of the hospital object based on the request data
        $hospital->name = $request->input('name');
        $hospital->location = $request->input('location');
        // Update other attributes as needed

        $hospital->save();

        return redirect('/hospitals')->with('success', 'Hospital updated successfully.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hospital $hospital)
    {
        //
        $hospital->delete();

        return redirect('/hospitals')->with('success', 'Hospital deleted successfully.');
    }
}
