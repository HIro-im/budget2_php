<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Calc extends Model
{
    //
    function get_calc_avg(Request $request){
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

        return array($daily_necessities_avg, $food_avg, $education_avg, $entertainment_avg, $clothing_avg, $medical_avg, $avg_sum);

    }
}
