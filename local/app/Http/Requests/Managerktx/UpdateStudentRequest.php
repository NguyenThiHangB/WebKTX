<?php

namespace App\Http\Requests\Managerktx;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Student;

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
        $student = Student::findStudent($this->student);
        return [
            'code_student' => [
            'required',
            Rule::unique('students')->ignore($student->id),
            ],
            'name' => 'required',
            'birth' => 'required',
            'gender' => 'required',
            'class' => 'required',
            'cource_id' => 'required',
            'identity_card' => 'required',
            'phone' => 'required|numeric',
            'address' =>  'required',
            'region_id' => 'required',
            'room_id' => 'required',
        ];
    }
}
