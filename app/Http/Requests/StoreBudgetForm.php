<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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
        $user_id = Auth::id();
        return [
            'budget_date' => ['required',Rule::unique('budget_forms','budget_date')->where('user_id', $user_id)],
            // 項目追加が発生した場合、以下の項目を追加していく
            'daily_necessities' => 'required|regex:/^[0-9]/|integer',
            'food' => 'required|regex:/^[0-9]/|integer',
            'education' => 'required|regex:/^[0-9]/|integer',
            'entertainment' => 'required|regex:/^[0-9]/|integer',
            'clothing' => 'required|regex:/^[0-9]/|integer',
            'medical' => 'required|regex:/^[0-9]/|integer'
        ];
    }
}
