<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ToursFilterRequest extends FormRequest
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
            'priceFrom' => 'numeric',
            'priceTo' => 'numeric',
            'dateFrom' => 'date',
            'dateTo' => 'date',
            'orderBy' => 'in:asc,desc',
        ];
    }

    public function messages()
    {
        return [
            'orderBy' => 'OrderBy accepts only (asc) or (desc) values',
        ];
    }
}
