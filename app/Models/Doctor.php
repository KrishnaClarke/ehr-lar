<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Doctor extends Model
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
            ->withPivot('active', 'disease', 'date_assigned', 'date_unassigned')
            ->withTimestamps();
    }

    public function activePatients(): BelongsToMany
    {
        return $this->patients()->wherePivot('active', true);
    }
}
