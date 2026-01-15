<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Nurse extends Model
{
    use HasFactory;

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
        return $this->belongsToMany(Patient::class)
            ->withPivot('active', 'date_assigned', 'date_unassigned')
            ->wherePivot('active', true)
            ->withTimestamps();
    }

    /**
     * All the doctors assigned to my active patients
     * @return void
     */
    public function doctors(): BelongsToMany
    {
        //
        return $this->belongsToMany(Doctor::class)
            ->withTimestamps();
    }

    /**
     * All the wards which have my active patients
     * @return void
     */
    public function wards(): BelongsToMany
    {
        //
        return $this->belongsToMany(Ward::class)
            ->using(PatientWard::class)
            ->withTimestamps();
    }

    /**
     * All the beds assigned to my active patients
     * @return void
     */
    public function beds(): BelongsToMany
    {
        //
        return $this->belongsToMany(Bed::class)
            ->using(PatientBed::class)
            ->withTimestamps();
    }

    public function commonDoctors(): BelongsToMany
{
    return $this->belongsToMany(Doctor::class)
    ->withPivot('doctor_patient', 'nurse_patient', 'doctor_id','nurse_patient', 'patient_id')
        ->withTimestamps();
}

}
