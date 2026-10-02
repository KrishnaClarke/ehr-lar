<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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

    protected $fillable = ['hospital_id', 'first_name', 'last_name', 'date_of_birth', 'email'];

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

    /** The bed this patient currently occupies (null if none). */
    public function bed(): HasOne
    {
        return $this->hasOne(Bed::class);
    }

    /** The ward of the bed this patient currently occupies. */
    public function ward(): HasOneThrough
    {
        return $this->hasOneThrough(Ward::class, Bed::class, 'patient_id', 'id', 'id', 'ward_id');
    }

    public function doctors(): BelongsToMany
    {
        return $this->belongsToMany(Doctor::class)
            ->withPivot('active', 'disease', 'date_assigned', 'date_unassigned')
            ->withTimestamps();
    }

    public function activeDoctors(): BelongsToMany
    {
        return $this->doctors()->wherePivot('active', true);
    }

    public function nurses(): BelongsToMany
    {
        return $this->belongsToMany(Nurse::class)
            ->withPivot('active', 'date_assigned', 'date_unassigned')
            ->withTimestamps();
    }

    public function activeNurses(): BelongsToMany
    {
        return $this->nurses()->wherePivot('active', true);
    }

    /** Patients with an admission that has not been closed by a discharge. */
    public function scopeAdmitted(Builder $query): Builder
    {
        return $query->whereHas('records', fn (Builder $q) => $q->whereNull('date_of_release'));
    }

    public function isAdmitted(): bool
    {
        return $this->records()->whereNull('date_of_release')->exists();
    }

    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
