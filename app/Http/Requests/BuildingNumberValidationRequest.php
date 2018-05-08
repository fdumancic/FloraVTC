<?php

namespace App\Http\Requests;

use App\Rules\ValidBuildingNumber;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class BuildingNumberValidationRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
                'building_number_id' => ['required', new ValidBuildingNumber()],
                'street_id' => 'required|exists:domacinstva,sifulice',
        ];
    }
}
