<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'name' => 'required|string|max:225',
            'father_name' => 'required|max:225',
            'mother_name' => 'required|max:225',
            'district' =>'required|max:225',
            'dob' => 'required',
            'current_class_room_id' => 'required',
            'teacher' =>'required',
            'phone' =>'required',
        ];
    }
}
