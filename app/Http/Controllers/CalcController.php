<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalcForm;
use Illuminate\Http\Request;
use App\Models\Calc;

use App\Models\BudgetForm;

class CalcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 計算対象の選択と、預金入力画面表示
    public function input()
    {
        //

    return view('calc.input');
    }

    // 平均金額計算と何か月持つかを算出する
    public function result(CalcForm $request)
    {
        //
        //入力した預金残高を変数に退避する
        $balance = $request->balance;
        //計算対象の金額を合計するための変数を用意する
        $avg_sum = 0;

        $getavg = new Calc;
        
        list($daily_necessities_avg, $food_avg, $education_avg, $entertainment_avg, $clothing_avg, $medical_avg, $avg_sum, $select_name) = $getavg->get_calc_avg($request);

        //計算前に小数点以下を切り捨てておく
        $avg_sum = floor($avg_sum);

        //入力された預金残高と計算対象の合計額を割り算して何か月無収入で過ごせるかを計算する(小数点以下切り捨て)
        $number_of_months = floor($balance / $avg_sum);


    return view('calc.result', compact('daily_necessities_avg','food_avg','education_avg','entertainment_avg','clothing_avg','medical_avg','avg_sum','number_of_months','select_name'));
    }

}
