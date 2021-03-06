<?php

namespace App\Http\Requests\Managerktx;

use Illuminate\Foundation\Http\FormRequest;

class CreateTypeRoomsRequest extends FormRequest
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
            'name' => 'required|unique:type_rooms,name,' . $this->id . ',id,deleted_at,NULL',
            'price' => 'required',
            'student_max' => 'required|numeric',
        ];
    }
}
