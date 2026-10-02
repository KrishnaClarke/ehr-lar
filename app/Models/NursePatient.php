<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NursePatient extends Model
{
    use HasFactory;

    protected $table = 'nurse_patient';

    protected $fillable = ['nurse_id', 'patient_id', 'active', 'date_assigned', 'date_unassigned'];

    protected $casts = ['active' => 'boolean'];
}
