<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bed extends Model
{
    use HasFactory;

    protected $fillable = ['ward_id', 'patient_id', 'occupied'];

    protected $casts = ['occupied' => 'boolean'];

    public function ward(): BelongsTo
    {
        return $this->belongsTo(Ward::class);
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function scopeAvailable(Builder $query): Builder
    {
        return $query->where('occupied', false)->whereNull('patient_id');
    }
}
