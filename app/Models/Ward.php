<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ward extends Model
{
    use HasFactory;

    public function hospital(): BelongsTo
    {
        return $this->belongsTo(Hospital::class);
    }

    public function beds(): HasMany
    {
        return $this->hasMany(Bed::class);
    }

    /**
     * All the patients in this ward
     * @return void
     */
    public function patients(): HasMany
    {
        //
        return $this->hasMany(Patient::class);
    }

    /**
     * All the doctors who care for patients in this ward
     * @return void
     */
    public function doctors(): BelongsToMany
    {
        //
        return $this->belongsToMany(Doctor::class)
            ->withTimestamps();
    }

    /**
     * All the nurses who care for patients in this ward
     * @return void
     */
    public function nurses(): BelongsToMany
    {
        //
        return $this->belongsToMany(Nurse::class)
            ->withTimestamps();
    }
    
}
