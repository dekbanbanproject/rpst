<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'DRUG_CODE'=>'required|string|max:255',
            'DRUG_NAME'=>'required|string|max:255',
            'DRUG_STRENGTH'=>'required|string|max:255',
            'DRUG_UNIT'=>'required|string|max:255',
            'DRUG_UNIT_PRICE' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'DRUG_STORE'=>'required|string|max:255',
            'DRUG_DID'=>'required|string|max:255',
            'DRUG_IMG'=>'nullable|image',
            'DRUG_UNIT_PRICE_COST'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'CAT_ID'=>'required|boolean',
            'STATUS'=>'required|boolean',
        ];
    }
}
