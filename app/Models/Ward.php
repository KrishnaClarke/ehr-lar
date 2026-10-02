<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Ward extends Model
{
    use HasFactory;

    protected $fillable = ['hospital_id', 'name'];

    public function hospital(): BelongsTo
    {
        return $this->belongsTo(Hospital::class);
    }

    public function beds(): HasMany
    {
        return $this->hasMany(Bed::class);
    }

    /** Patients currently occupying a bed in this ward. */
    public function patients(): HasManyThrough
    {
        return $this->hasManyThrough(Patient::class, Bed::class, 'ward_id', 'id', 'id', 'patient_id');
    }
}
