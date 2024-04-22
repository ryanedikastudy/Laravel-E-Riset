<?php

namespace App\Http\Requests\Researcher;

use Illuminate\Foundation\Http\FormRequest;

class StorePatentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'research_id' => ['required', 'integer', 'exists:research,id',],
            'title' => ['required', 'string', 'max:255'],
            'document' => ['required', 'file', 'mimes:pdf', 'max:102400'],
            'published_at' => ['required', 'date', 'before_or_equal:today'],
        ];
    }

    /**
     * Set the attributes naming for localization.
     */
    public function attributes(): array
    {
        return [
            'research_id' => __('Judul Riset Terkait'),
            'title' => __('Judul Paten'),
            'document' => __('Dokumen Paten'),
            'published_at' => __('Tanggal Paten'),
        ];
    }
}
