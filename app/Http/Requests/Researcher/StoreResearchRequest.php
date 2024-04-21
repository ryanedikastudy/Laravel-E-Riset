<?php

namespace App\Http\Requests\Researcher;

use Illuminate\Foundation\Http\FormRequest;

class StoreResearchRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'abstract' => ['required', 'string', 'min:40', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'published_at' => ['required', 'date', 'before_or_equal:today'],
            'research_type_id' => ['required', 'integer', 'exists:research_types,id'],
            'research_field_id' => ['required', 'integer', 'exists:research_fields,id'],
        ];
    }

    /**
     * Set the attributes naming for localization.
     */
    public function attributes(): array
    {
        return [
            'title' => __('Judul Penelitian'),
            'abstract' => __('Abstrak Penelitian'),
            'location' => __('Lokasi Penelitian'),
            'published_at' => __('Tanggal Publikasi Penelitian'),
            'research_type_id' => __('Tipe Penelitian'),
            'research_field_id' => __('Bidang Penelitian'),
        ];
    }
}
