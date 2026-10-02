<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\Doctor;
use App\Models\Nurse;
use App\Models\Patient;
use App\Models\Ward;

class StatisticsController extends Controller
{
    public function index()
    {
        $totalBeds = Bed::count();
        $availableBeds = Bed::available()->count();

        return view('hospital.index', [
            'doctorCount' => Doctor::count(),
            'nursesCount' => Nurse::count(),
            'patientCount' => Patient::admitted()->count(),
            'dischargedCount' => Patient::count() - Patient::admitted()->count(),
            'totalBeds' => $totalBeds,
            'availableBeds' => $availableBeds,
            'occupancy' => $totalBeds ? round(($totalBeds - $availableBeds) / $totalBeds * 100) : 0,
            'wards' => Ward::withCount([
                'beds',
                'beds as occupied_beds_count' => fn ($q) => $q->where('occupied', true),
            ])->orderBy('name')->get(),
        ]);
    }
}
