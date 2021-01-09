<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'student_id' => 'required|numeric',
            'student_name' => 'required|string|max:100',
            'student_email' => 'required|string|email|max:100|unique:students,student_email,'.$this->student_id,
            'student_birth_date' => 'required|date',
            'student_mobile' => 'nullable|string|max:13|min:10|unique:students,student_mobile,'.$this->student_id,
            'student_stream' => 'required|string|max:50',
            'student_address' => 'nullable|string|max:200',
            'student_profile_picture' => 'nullable|file|mimes:jpg,JPG,png,PNG,bpm,gif',
            'student_gender' => 'nullable|string|max:8',
            'student_hobbies' => 'nullable|array|max:4',
        ];
    }

    public function messages()
    {
        return [
            'student_id.required' => 'Hey you please don\'t mess with code we are not fool here',
            'student_name.required' => 'Please Fill Student Name',
            'student_email.required' => 'Please Fill student email',
            'student_email.email' => 'Be sure that inserted email is in correct format',
        ];
    }
}
