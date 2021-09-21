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
        * 検証用の関数(以下の変数は、無名関数内で記載した処理を実施するにあたり、いい感じに前処理から取ってきたり、結果として出力してくれる)
        *   $attribute: 検証中の属性名(勝手に入力値の属性を代入してくれる)
        *   $value    : 検証中の属性の値()
        *   $fail     : 失敗時に呼び出すメソッド?
        **/ 
        $validate_func = function($attribute, $value, $fail) {
            // 入力の取得(本来なら$valueで入力値を一つ取り出せるけど、複数項目絡めないといけないので、all()で取得)
            $input_data = $this->all();
    
            // 条件に合致しなかったら失敗
            // 項目追加が発生した場合、以下の項目を追加していく
            if ($input_data['daily_necessities'] == 0 
            && $input_data['food'] == 0 
            && $input_data['education'] == 0
            && $input_data['entertainment'] == 0
            && $input_data['clothing'] == 0
            && $input_data['medical'] == 0) {
                //$fail('')//変数だけど関数(カッコ内に入れると出力する)
                $fail('いずれかの項目を含めるに修正してください'); // エラーメッセージ
            }
        };
        $item_count_validation = ['required',$validate_func];

        $user_id = Auth::id();
        return [
            // 項目追加が発生した場合、以下の項目を追加していく
            'balance' => 'required|min:1|integer',
            'daily_necessities' => ['required',$validate_func]
            // 'food' => $item_count_validation,
            // 'education' => $item_count_validation,
            // 'entertainment' => $item_count_validation,
            // 'clothing' => $item_count_validation,
            // 'medical' => $item_count_validation
        ];
    }
}
