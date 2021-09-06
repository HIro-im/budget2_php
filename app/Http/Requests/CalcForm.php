<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CalcForm extends FormRequest
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
        /**
        * 検証用の関数
        *   $attribute: 検証中の属性名
        *   $value    : 検証中の属性の値
        *   $fail     : 失敗時に呼び出すメソッド?
        **/ 
        $validate_func = function($attribute, $value, $fail) {
            // 入力の取得
            $input_data = $this->all();
    
            // 条件に合致しなかったら失敗
            if (1 <= $input_data['daily_necessities'] == 0 
            && $input_data['food'] == 0 
            && $input_data['education'] == 0
            && $input_data['entertainment'] == 0
            && $input_data['clothing'] == 0
            && $input_data['medical'] == 0) {
                $fail('いずれかの項目を含めるに修正してください'); // エラーメッセージ
            }
        };
        $item_count_validation = ['required',$validate_func];

        $user_id = Auth::id();
        return [
            //
            'balance' => 'required|min:1|integer',
            'daily_necessities' => $item_count_validation,
            'food' => $item_count_validation,
            'education' => $item_count_validation,
            'entertainment' => $item_count_validation,
            'clothing' => $item_count_validation,
            'medical' => $item_count_validation
        ];
    }
}
