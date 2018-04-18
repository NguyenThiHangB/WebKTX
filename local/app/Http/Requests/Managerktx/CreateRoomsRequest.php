<?php

namespace App\Http\Requests\Managerktx;

use Illuminate\Foundation\Http\FormRequest;

class CreateRoomsRequest extends FormRequest
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
            'name' => 'required|unique:rooms,name,' . $this->id . ',id,deleted_at,NULL',
            'row_id' => 'required',
            'type_room_id' => 'required',
            'numnber_student_max' => 'required|numeric',
            'numnber_student_present' => 'required|numeric',
        ];
    }
}
