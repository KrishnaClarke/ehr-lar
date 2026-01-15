<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Patient extends Model
{
    use HasFactory;

    public function hospital(): BelongsTo
    {
        return $this->belongsTo(Hospital::class);
    }

    public function records(): HasMany
    {
        return $this->hasMany(PatientRecord::class);
    }

    public function latestRecord(): HasOne
    {
        return $this->hasOne(PatientRecord::class)->latestOfMany();
    }

    public function bed(): HasOne
    {
        //
        return $this->hasOne(Bed::class);
    }
    

    public function ward(): BelongsTo
    {
        //
        return $this->belongsTo(Ward::class);
    }
    public function doctors(): BelongsToMany
    {
        return $this->belongsToMany(Doctor::class)
        ->withPivot('active')
        ->withTimestamps()
        ;
    }
    
    public function activeDoctors(): BelongsTo
    {
        return $this->belongsTo(Doctor::class, 'doctor_patient', 'patient_id', 'doctor_id')
           
            ->wherePivot('active', true)
            ;
    }

    public function nurses(): BelongsToMany
    {
        return $this->belongsToMany(Nurse::class)
            ->withPivot('active', 'date_assigned', 'date_unassigned')
            ->withTimestamps();
    }
    public function discharge()
    {
        $this->bed()->update(['patient_id' => null]);
    }


    public function patientRecords()
    {
        return $this->hasMany(PatientRecord::class);
    }
}

   

