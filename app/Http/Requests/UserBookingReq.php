<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserBookingReq extends FormRequest
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
            'name'  => 'required',
            'phone_number'  => 'required|numeric',
            'address' => 'required',
            'date' => 'required',
            'time_id' => 'required',
            'futsal_court_id' => 'required',
            'payment' => 'required|image|file|mimes:png,jpg,jpeg,webp|max:3072'
        ];
    }
}
