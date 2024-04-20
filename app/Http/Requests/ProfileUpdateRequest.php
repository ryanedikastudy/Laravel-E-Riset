<?php

namespace App\Http\Requests;

use App\Models\Researcher;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'identifier' => ['required', 'string', 'min:16', 'max:18', Rule::unique(Researcher::class, 'identifier')->ignore($this->user()->researcher->id)],
            'dob' => ['required', 'date', 'before:' . now()],
            'gender' => ['required', 'string', 'in:male,female'],
            'nationality' => ['required', 'string', 'min:3', 'max:255'],
            'religion' => ['required', 'string', 'min:3', 'max:255'],
            'phone' => ['required', 'string', 'min:10', 'max:15'],
            'address' => ['required', 'string', 'min:3', 'max:255'],
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif'],
        ];
    }
}
