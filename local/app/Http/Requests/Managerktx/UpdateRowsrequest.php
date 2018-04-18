<?php

namespace App\Http\Requests\Managerktx;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Row;

class UpdateRowsrequest extends FormRequest
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
        $row = Row::findRow($this->row);
        return [
            'name' => [
            'required',
            Rule::unique('rows')->ignore($row->id),
            ],
            'region_id' => 'required',
            'number_room' => 'required',
        ];
    }
}
