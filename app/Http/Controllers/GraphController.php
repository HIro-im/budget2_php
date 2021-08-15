<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Test;
use App\Models\GraphForm;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\String_;

class GraphController extends Controller
{
    //
    public function make_graph(Request $request, $content){

        //メソッドで使用するプレースホルダ用に連想配列を作り、DBから値を取得するためメソッドに引き渡す
        //switchで、項目ごとに呼び出すメソッドを切り替える
        $query_param = ['id' => Auth::id()];

        $getparam = new GraphForm;
        $label_array = $getparam->get_budget_date($query_param);

        switch($content){
            case 'daily':
                $param_array = $getparam->get_budget_daily($query_param);
                break;
            case 'food':
                $param_array = $getparam->get_budget_food($query_param);
                break;
            case 'education':
                $param_array = $getparam->get_budget_education($query_param);
                break;
            case 'entertainment':
                $param_array = $getparam->get_budget_entertainment($query_param);
                break;
            case 'clothing':
                $param_array = $getparam->get_budget_clothing($query_param);
                break;
            case 'medical':
                $param_array = $getparam->get_budget_medical($query_param);
                break;
        }


        //ラベル用のデータとグラフ用のデータをそれぞれキーから分離する。

        $label = $getparam->data_separate($label_array);
        list($param, $data_name) = $getparam->data_separate($param_array);

        //ビューファイルのchart.jsへ値を渡す為json形式にデータを変換する
        $json_label = json_encode($label);
        $json_param = json_encode($param);
        $json_name = json_encode($data_name);

        return view('budget.graph', compact('json_param','json_label','json_name'));
    }
}