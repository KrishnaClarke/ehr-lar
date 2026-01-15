<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWardRequest;
use App\Http\Requests\UpdateWardRequest;
use App\Models\Ward;

class WardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ward $ward)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ward $ward)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWardRequest $request, Ward $ward)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ward $ward)
    {
        //
    }

    public function getPatientsByBedId($bedId)
    {
        $ward = Ward::whereHas('beds', function ($query) use ($bedId) {
            $query->where('id', $bedId);
        })->first();

        if ($ward) {
            $patients = $ward->patients;
            return response()->json($patients);
        } else {
            return response()->json(['message' => 'No ward found for the given bed ID'], 404);
        }
    }
}
