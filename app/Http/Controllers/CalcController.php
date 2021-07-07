<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BudgetForm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

    return view('calc.input', /*compact('budgets')*/);
    }

    // 平均金額計算と何か月持つかを算出する
    public function result(Request $request)
    {
        //
        //入力した預金残高を変数に退避する
        $balance = $request->balance;
        //計算対象の金額を合計するための変数を用意する
        $avg_sum = 0;
        
        //平均金額を算出する(AVGで算出)。また、ラジオボタンが【含める】となっている場合、avg_sumに各値を加算する。
        $daily_necessities_avg = DB::table('budget_forms')->where('user_id', '=', Auth::id())
        ->avg('daily_necessities');
        $daily_necessities_avg = floor($daily_necessities_avg);
        if ($request->daily_necessities === '1'){
            $avg_sum += $daily_necessities_avg;
        }

        $food_avg = DB::table('budget_forms')->where('user_id', '=', Auth::id())
        ->avg('food');
        $food_avg = floor($food_avg);
        if ($request->food === '1'){
            $avg_sum += $food_avg;
        }

        $education_avg = DB::table('budget_forms')->where('user_id', '=', Auth::id())
        ->avg('education');
        $education_avg = floor($education_avg);
        if ($request->education === '1'){
            $avg_sum += $education_avg;
        }

        $entertainment_avg = DB::table('budget_forms')->where('user_id', '=', Auth::id())
        ->avg('entertainment');
        $entertainment_avg = floor($entertainment_avg);
        if ($request->entertainment === '1'){
            $avg_sum += $entertainment_avg;
        }

        $clothing_avg = DB::table('budget_forms')->where('user_id', '=', Auth::id())
        ->avg('clothing');
        $clothing_avg = floor($clothing_avg);
        if ($request->clothing === '1'){
            $avg_sum += $clothing_avg;
        }

        $medical_avg = DB::table('budget_forms')->where('user_id', '=', Auth::id())
        ->avg('medical');
        $medical_avg = floor($medical_avg);
        if ($request->medical === '1'){
            $avg_sum += $medical_avg;
        }

        //計算前に小数点以下を切り捨てておく
        $avg_sum = floor($avg_sum);

        //入力された預金残高と計算対象の合計額を割り算して何か月無収入で過ごせるかを計算する(小数点以下切り捨て)
        $number_of_months = floor($balance / $avg_sum);



    return view('calc.result', compact('daily_necessities_avg','food_avg','education_avg','entertainment_avg','clothing_avg','medical_avg','number_of_months'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('budget.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $budget = new BudgetForm;

        $budget->month = $request->input('month');
        $budget->daily_necessities = $request->input('daily_necessities');
        $budget->food = $request->input('food');
        $budget->education = $request->input('education');
        $budget->entertainment = $request->input('entertainment');
        $budget->clothing = $request->input('clothing');
        $budget->medical = $request->input('medical');

        $budget->save();

        return redirect('budget/index');
        // dd($month);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
