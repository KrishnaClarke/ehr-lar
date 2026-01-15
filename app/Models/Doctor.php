<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Doctor extends Model
{
    use HasFactory;

    public function hospital(): BelongsTo
    {
        return $this->belongsTo(Hospital::class);
    }

    public function patients():  BelongsToMany
    {
        return $this->belongsToMany(Patient::class)
        ->withPivot('active')
        ->withTimestamps();
    }

    public function activePatients(): HasMany
    {
        return $this->hasMany(Patient::class, 'doctor_patient', 'doctor_id')
           
            ->wherePivot('active', true)
            ;
    }

    /**
     * All the nurses who care for my active patients
     * @return void
     */
    public function nurses(): BelongsToMany
    {
        //
        return $this->belongsToMany(Nurse::class)
            ->withTimestamps();
    }
}
