<?php

namespace App\Http\Requests\Managerktx;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
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
            'code_employee' => 'required|unique:employees,code_employee|max:10,' . $this->id . ',id,deleted_at,NULL',
            'name' => 'required',
            'birth' => 'required',
            'gender' => 'required',
            'phone' => 'required|numeric',
            'address' =>  'required',
            'position_id' => 'required',
        ];
    }
}
