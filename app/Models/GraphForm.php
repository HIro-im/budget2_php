<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GraphForm extends Model
{
    //DBからユーザIDに紐づく値を全て取ってくる(引数にユーザIDを渡す)
    //※戻り値が多次元配列でやってくるので、別のメソッドで加工して使う。
    //ここは、年月を取ってくるメソッド
    function get_budget_date(array $param_id){
        $budget_date = DB::select('SELECT budget_date FROM budget_forms where user_id = :id ORDER BY budget_date', $param_id);
        return $budget_date;
    }

    //以下は、各項目からデータを取ってくるメソッド
    function get_budget_daily(array $param_id){
        $all_daily_necessities = DB::select('SELECT daily_necessities FROM budget_forms where user_id = :id ORDER BY budget_date', $param_id);
        return $all_daily_necessities;
    }

    function get_budget_food(array $param_id){
        $all_food = DB::select('SELECT food FROM budget_forms where user_id = :id ORDER BY budget_date', $param_id);
        return $all_food;
    }

    function get_budget_education(array $param_id){
        $all_education = DB::select('SELECT education FROM budget_forms where user_id = :id ORDER BY budget_date', $param_id);
        return $all_education;
    }

    function get_budget_entertainment(array $param_id){
        $all_entertainment = DB::select('SELECT entertainment FROM budget_forms where user_id = :id ORDER BY budget_date', $param_id);
        return $all_entertainment;
    }

    function get_budget_clothing(array $param_id){
        $all_clothing = DB::select('SELECT clothing FROM budget_forms where user_id = :id ORDER BY budget_date', $param_id);
        return $all_clothing;
    }

    function get_budget_medical(array $param_id){
        $all_medical = DB::select('SELECT medical FROM budget_forms where user_id = :id ORDER BY budget_date', $param_id);
        return $all_medical;
    }

    //各データ取得が終わったら、多次元配列からデータを分離する処理が必要
    function data_separate(array $param_array){
        foreach($param_array as $arry){
            foreach($arry as $key => $value){
                $param[] = $value;
            }
        }

        //項目名を持っている場合には項目名と金額を戻り値としてセットする(戻り値を複数返す)
        //ラベルのみの場合(=年月の場合)は年月だけを戻り値としてセットする(戻り値は一つだけ)

        switch($key){
            case 'daily_necessities':
                $data_name = '日用品';
                return array($param,$data_name);
                break;
            case 'food':
                $data_name = '食費';
                return array($param,$data_name);
                break;
            case 'education':
                $data_name = '教養・教育';
                return array($param,$data_name);
                break;
            case 'entertainment':
                $data_name = '趣味・娯楽';
                return array($param,$data_name);
                break;
            case 'clothing':
                $data_name = '衣服・美容';
                return array($param,$data_name);
                break;
            case 'medical':
                $data_name = '健康・医療';
                return array($param,$data_name);
                break;
            default:
                return $param;
                break;
        }
    }

    // function GetXXX($id, $useMethod) {
    //     //プレースホルダ用に連想配列を作り、DBから値を取得するためメソッドに引き渡す
    //     $query_param = ['id' => $id];

    //     $getparam = new GraphForm;
    //     $label_array = $getparam->get_budget_date($query_param);
    //     $param_array = $getparam->$useMethod($query_param);
        

    //     //ラベル用のデータとグラフ用のデータをそれぞれキーから分離する。

    //     $label = $getparam->data_separate($label_array);
    //     list($param, $data_name) = $getparam->data_separate($param_array);

    //     //ビューファイルのchart.jsへ値を渡す為json形式にデータを変換する
    //     $json_label = json_encode($label);
    //     $json_param = json_encode($param);
    //     $json_name = json_encode($data_name);

    //     return {'json_label' => $json_label, 'json_param' => $json_param, 'json_name' => $json_name}
    // }
}