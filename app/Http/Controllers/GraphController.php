<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Test;
use App\Models\GraphForm;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class GraphController extends Controller
{
    //
    public function make_daily(Request $request){

        //プレースホルダ用に連想配列を作り、メソッドに引き渡す
        $query_param = ['id' => Auth::id()];

        //DBから値を取得して、データをキーから分離、jsonに変換して渡す。
        $getparam = new GraphForm;
        $label_array = $getparam->get_budget_date($query_param);
        $param_array = $getparam->get_budget_daily($query_param);

        //ラベル用のデータとグラフ用のデータをそれぞれキーから分離する。

        foreach($label_array as $arry){
            foreach($arry as $key => $value){
                $label[] = $value;
            }
        }

        foreach($param_array as $arry){
            foreach($arry as $key => $value){
                $param[] = $value;
                $data_name = $key;
            }
        }

        $json_label = json_encode($label);
        $json_param = json_encode($param);
        $json_name = json_encode($data_name);

        return view('budget.graph.daily', compact('json_param','json_label','json_name'));
    }

    public function make_food(Request $request){

        //プレースホルダ用に連想配列を作り、メソッドに引き渡す
        $query_param = ['id' => Auth::id()];

        //DBから値を取得して、データをキーから分離、jsonに変換して渡す。
        $getparam = new GraphForm;
        $label_array = $getparam->get_budget_date($query_param);
        $param_array = $getparam->get_budget_food($query_param);

        //ラベル用のデータとグラフ用のデータをそれぞれキーから分離する。

        foreach($label_array as $arry){
            foreach($arry as $key => $value){
                $label[] = $value;
            }
        }

        foreach($param_array as $arry){
            foreach($arry as $key => $value){
                $param[] = $value;
                $data_name = $key;
            }
        }

        $json_label = json_encode($label);
        $json_param = json_encode($param);
        $json_name = json_encode($data_name);

        return view('budget.graph.food', compact('json_param','json_label','json_name'));
    }
}
