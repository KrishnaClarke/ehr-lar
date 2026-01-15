<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Hospital extends Model
{
    use HasFactory;

    public function wards(): HasMany
    {
        return $this->hasMany(Ward::class);
    }
    public function beds(): HasManyThrough
    {
        return $this->hasManyThrough(Bed::class, Ward::class);
    }
    public function doctors(): HasMany
    {
        return $this->hasMany(Doctor::class);
    }

    public function patients(): HasMany
    {
        return $this->hasMany(Patient::class);
    }
    public function patientRecords(): HasMany
    {
        return $this->hasMany(PatientRecord::class);
    }

    public function nurses(): HasMany
    {
        return $this->hasMany(Nurse::class);
    }
}
