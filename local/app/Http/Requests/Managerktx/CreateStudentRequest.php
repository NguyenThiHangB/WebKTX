<?php

namespace App\Http\Requests\Managerktx;

use Illuminate\Foundation\Http\FormRequest;

class CreateStudentRequest extends FormRequest
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
            'code_student' => 'required|unique:students,code_student|max:10,' . $this->id . ',id,deleted_at,NULL',
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
