<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSessionRequest extends FormRequest
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
//            'title' => 'required',
//            'day' => 'required|date',
//            'starts_at' => 'required|date_format:H:i',
//            'ends_at' => 'nullable|date_format:H:i',
//            'subject_id' => 'required|exists:subjects,id'
        ];
    }
}
