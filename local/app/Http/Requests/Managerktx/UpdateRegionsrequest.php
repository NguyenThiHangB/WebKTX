<?php

namespace App\Http\Requests\Managerktx;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Region;

class UpdateRegionsrequest extends FormRequest
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
        $region = Region::findRegion($this->region);
        return [
            'name' => [
            'required',
            Rule::unique('regions')->ignore($region->id),
            ],
            'number_row' => 'required',
        ];
    }
}
