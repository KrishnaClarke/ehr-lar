<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Services\PatientFlow;
use Illuminate\Http\Request;

/** Frees an occupied bed without discharging the patient. */
class RemovePatientFromBedController extends Controller
{
    public function __construct(private PatientFlow $flow)
    {
    }

    public function show()
    {
        return view('update.update-bed', [
            'beds' => Bed::with(['ward', 'patient'])->where('occupied', true)->orderBy('ward_id')->orderBy('id')->get(),
        ]);
    }

    public function remove(Request $request)
    {
        $data = $request->validate(['bed_id' => ['required', 'exists:beds,id']]);

        $this->flow->releaseBed(Bed::findOrFail($data['bed_id']));

        return redirect('/beds')->with('success', 'Patient removed from bed.');
    }
}
