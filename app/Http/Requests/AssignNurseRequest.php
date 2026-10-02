<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AssignNurseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nurse_id' => ['required', 'exists:nurses,id'],
            'patient_id' => ['required', 'exists:patients,id'],
            'date_assigned' => ['required', 'date'],
            'active' => ['nullable', 'boolean'],
        ];
    }
}
