<?php

namespace App\Http\Requests\Managerktx;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Employee;

class UpdateEmployeeRequest extends FormRequest
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
        $employee = Employee::findEmployee($this->employee);
        return [
            'code_employee' => [
            'required',
            Rule::unique('employees')->ignore($employee->id),
            ],
            'name' => 'required',
            'birth' => 'required',
            'gender' => 'required',
            'phone' => 'required|numeric',
            'address' =>  'required',
            'position_id' => 'required',
        ];
    }
}