<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBudgetForm extends FormRequest
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
            //
            'budget_date' => 'required|unique:budget_forms',
            'daily_necessities' => 'required|regex:/^[0-9]/|integer',
            'food' => 'required|regex:/^[0-9]/|integer',
            'education' => 'required|regex:/^[0-9]/|integer',
            'entertainment' => 'required|regex:/^[0-9]/|integer',
            'clothing' => 'required|regex:/^[0-9]/|integer',
            'medical' => 'required|regex:/^[0-9]/|integer'
        ];
    }
}
