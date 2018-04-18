<?php

namespace App\Http\Requests\Managerktx;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\TypeRoom;

class UpdateTypeRoomsRequest extends FormRequest
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
        $typeroom = TypeRoom::findTypeRoom($this->typeroom);

        return [
                'name' => [
                'required',
                Rule::unique('type_rooms')->ignore($typeroom->id),
            ],
            'price' => 'required',
            'student_max' => 'required|numeric',
        ];
    }
}
