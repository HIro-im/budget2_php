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

        //プレースホルダ用に連想配列を作り、DBから値を取得するためメソッドに引き渡す
        $query_param = ['id' => Auth::id()];

        $getparam = new GraphForm;
        $label_array = $getparam->get_budget_date($query_param);
        $param_array = $getparam->get_budget_daily($query_param);

        //ラベル用のデータとグラフ用のデータをそれぞれキーから分離する。

        $label = $getparam->data_separate($label_array);
        list($param, $data_name) = $getparam->data_separate($param_array);

        //ビューファイルのchart.jsへ値を渡す為json形式にデータを変換する
        $json_label = json_encode($label);
        $json_param = json_encode($param);
        $json_name = json_encode($data_name);

        return view('budget.graph.daily', compact('json_param','json_label','json_name'));
    }

    public function make_food(Request $request){

        //プレースホルダ用に連想配列を作り、DBから値を取得するためメソッドに引き渡す
        $query_param = ['id' => Auth::id()];

        $getparam = new GraphForm;
        $label_array = $getparam->get_budget_date($query_param);
        $param_array = $getparam->get_budget_food($query_param);

        //ラベル用のデータとグラフ用のデータをそれぞれキーから分離する。

        $label = $getparam->data_separate($label_array);
        list($param, $data_name) = $getparam->data_separate($param_array);

        //ビューファイルのchart.jsへ値を渡す為json形式にデータを変換する
        $json_label = json_encode($label);
        $json_param = json_encode($param);
        $json_name = json_encode($data_name);

        return view('budget.graph.food', compact('json_param','json_label','json_name'));
    }

    public function make_education(Request $request){

        //プレースホルダ用に連想配列を作り、DBから値を取得するためメソッドに引き渡す
        $query_param = ['id' => Auth::id()];

        $getparam = new GraphForm;
        $label_array = $getparam->get_budget_date($query_param);
        $param_array = $getparam->get_budget_education($query_param);

        //ラベル用のデータとグラフ用のデータをそれぞれキーから分離する。

        $label = $getparam->data_separate($label_array);
        list($param, $data_name) = $getparam->data_separate($param_array);

        //ビューファイルのchart.jsへ値を渡す為json形式にデータを変換する
        $json_label = json_encode($label);
        $json_param = json_encode($param);
        $json_name = json_encode($data_name);

        return view('budget.graph.education', compact('json_param','json_label','json_name'));
    }

    public function make_entertainment(Request $request){

        //プレースホルダ用に連想配列を作り、DBから値を取得するためメソッドに引き渡す
        $query_param = ['id' => Auth::id()];

        $getparam = new GraphForm;
        $label_array = $getparam->get_budget_date($query_param);
        $param_array = $getparam->get_budget_entertainment($query_param);

        //ラベル用のデータとグラフ用のデータをそれぞれキーから分離する。

        $label = $getparam->data_separate($label_array);
        list($param, $data_name) = $getparam->data_separate($param_array);

        //ビューファイルのchart.jsへ値を渡す為json形式にデータを変換する
        $json_label = json_encode($label);
        $json_param = json_encode($param);
        $json_name = json_encode($data_name);

        return view('budget.graph.entertainment', compact('json_param','json_label','json_name'));
    }

    public function make_clothing(Request $request){

        //プレースホルダ用に連想配列を作り、DBから値を取得するためメソッドに引き渡す
        $query_param = ['id' => Auth::id()];

        $getparam = new GraphForm;
        $label_array = $getparam->get_budget_date($query_param);
        $param_array = $getparam->get_budget_clothing($query_param);

        //ラベル用のデータとグラフ用のデータをそれぞれキーから分離する。

        $label = $getparam->data_separate($label_array);
        list($param, $data_name) = $getparam->data_separate($param_array);

        //ビューファイルのchart.jsへ値を渡す為json形式にデータを変換する
        $json_label = json_encode($label);
        $json_param = json_encode($param);
        $json_name = json_encode($data_name);

        return view('budget.graph.clothing', compact('json_param','json_label','json_name'));
    }

    public function make_medical(Request $request){

        //プレースホルダ用に連想配列を作り、DBから値を取得するためメソッドに引き渡す
        $query_param = ['id' => Auth::id()];

        $getparam = new GraphForm;
        $label_array = $getparam->get_budget_date($query_param);
        $param_array = $getparam->get_budget_medical($query_param);

        //ラベル用のデータとグラフ用のデータをそれぞれキーから分離する。

        $label = $getparam->data_separate($label_array);
        list($param, $data_name) = $getparam->data_separate($param_array);

        //ビューファイルのchart.jsへ値を渡す為json形式にデータを変換する
        $json_label = json_encode($label);
        $json_param = json_encode($param);
        $json_name = json_encode($data_name);

        return view('budget.graph.medical', compact('json_param','json_label','json_name'));
    }
}
