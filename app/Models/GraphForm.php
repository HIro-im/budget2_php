<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GraphForm extends Model
{
    //DBからユーザIDに紐づく値を全て取ってくる(引数にユーザIDを渡す)
    //※戻り値が多次元配列でやってくるので、コントローラー側で加工して使う。
    //
    function getbudgetdate(array $param_id){
        $budget_date = DB::select('SELECT budget_date FROM budget_forms where user_id = :id ORDER BY budget_date', $param_id);
        return $budget_date;
    }

    function getbudget_daily(array $param_id){
        $all_daily_necessities = DB::select('SELECT daily_necessities FROM budget_forms where user_id = :id ORDER BY budget_date', $param_id);
        return $all_daily_necessities;
    }
}
