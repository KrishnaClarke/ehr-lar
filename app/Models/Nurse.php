<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

class Nurse extends Model
{
    use HasFactory;

    protected $fillable = ['hospital_id', 'first_name', 'last_name', 'date_of_birth', 'email'];

    public function hospital(): BelongsTo
    {
        return $this->belongsTo(Hospital::class);
    }

    public function patients(): BelongsToMany
    {
        return $this->belongsToMany(Patient::class)
            ->withPivot('active', 'date_assigned', 'date_unassigned')
            ->withTimestamps();
    }

    public function activePatients(): BelongsToMany
    {
        return $this->patients()->wherePivot('active', true);
    }

    /**
     * Other nurses who currently look after a patient of one of the doctors
     * that treat this nurse's active patients.
     *
     * @return Collection<int, Nurse>
     */
    public function colleagues(): Collection
    {
        $patientIds = $this->activePatients()->pluck('patients.id');

        $doctorIds = DB::table('doctor_patient')
            ->whereIn('patient_id', $patientIds)
            ->where('active', true)
            ->pluck('doctor_id');

        $nurseIds = DB::table('nurse_patient as np')
            ->join('doctor_patient as dp', 'dp.patient_id', '=', 'np.patient_id')
            ->where('np.active', true)
            ->where('dp.active', true)
            ->whereIn('dp.doctor_id', $doctorIds)
            ->where('np.nurse_id', '!=', $this->id)
            ->pluck('np.nurse_id')
            ->unique();

        return static::whereIn('id', $nurseIds)->orderBy('last_name')->get();
    }
}
