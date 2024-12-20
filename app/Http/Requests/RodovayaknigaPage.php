<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RodovayaknigaPage extends FormRequest
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
            'rodovayakniga_id' => 'required|integer|exists:rodovayakniga,id',
            'text' => 'required|string|min:1|max:2500',
            'human_id' => 'required|integer|exists:human,id',
        ];
    }
}
