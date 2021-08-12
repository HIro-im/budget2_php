<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GraphForm extends Model
{
    //DBからユーザIDに紐づく値を全て取ってくる(引数にユーザIDを渡す)
    //※戻り値が多次元配列でやってくるので、コントローラー側で加工して使う。
    //
    function get_budget_date(array $param_id){
        $budget_date = DB::select('SELECT budget_date FROM budget_forms where user_id = :id ORDER BY budget_date', $param_id);
        return $budget_date;
    }

    function get_budget_daily(array $param_id){
        $all_daily_necessities = DB::select('SELECT daily_necessities FROM budget_forms where user_id = :id ORDER BY budget_date', $param_id);
        return $all_daily_necessities;
    }

    function get_budget_food(array $param_id){
        $all_food = DB::select('SELECT food FROM budget_forms where user_id = :id ORDER BY budget_date', $param_id);
        return $all_food;
    }


    //各データ取得が終わったら、多次元配列からデータを分離する処理が必要
    function data_separate(array $param_array){
        foreach($param_array as $arry){
            foreach($arry as $key => $value){
                $param[] = $value;
                if ($key !== 'budget_date'){
                    $data_name = $key;
                }
            }
        }
        //グラフの値を持っている場合にはその値とパラメータを戻り値としてセットする
        if (isset($data_name)){
            return array($param,$data_name);
        }
        return $param;
    }
}
