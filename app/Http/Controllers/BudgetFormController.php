<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BudgetForm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBudgetForm;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class BudgetFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 項目追加が発生した場合、下記のselect文の項目を追加していく

        $budgets = DB::table('budget_forms')
        ->select('id', 'budget_date', 'daily_necessities', 'food', 'education', 'entertainment', 'clothing', 'medical')
        ->where('user_id', '=', Auth::id())
        ->orderBy('budget_date' , 'DESC')
        ->get();

        // dd($budgets);
    return view('budget.index', compact('budgets'));
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
    public function store(StoreBudgetForm $request)
    {
        //

        $budget = new BudgetForm;

        // 項目追加が発生した場合、下記の項目を追加していく
        $budget->budget_date = $request->input('budget_date');
        $budget->user_id = Auth::id();
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
        //詳細ボタンを押した月のデータを取ってくる
        $budget_month = BudgetForm::find($id);

        return view('budget.show', compact('budget_month'));
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
        dd($id);
        $budget_month = BudgetForm::find($id);

        return view('budget.edit', compact('budget_month'));
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
        //詳細画面にて選択している月を修正する。
        $budget_month = BudgetForm::find($id);

        //バリデーション(新規作成とは違い、同じ年月のデータを入れられるようにする)
        // 項目追加が発生した場合、下記のバリデーション項目を追加していく
        dd($id);
        Validator::make($request->all(),[
            'budget_date' => ['required',Rule::unique('budget_forms')->ignore($id)],
            'daily_necessities' => ['required','regex:/^[0-9]/','integer'],
            'food' => ['required','regex:/^[0-9]/','integer'],
            'education' => ['required','regex:/^[0-9]/','integer'],
            'entertainment' => ['required','regex:/^[0-9]/','integer'],
            'clothing' => ['required','regex:/^[0-9]/','integer'],
            'medical' => ['required','regex:/^[0-9]/','integer']
        ])->validate();

        // 項目追加が発生した場合、下記の項目を追加していく
        $budget_month->budget_date = $request->input('budget_date');
        $budget_month->user_id = Auth::id();
        $budget_month->daily_necessities = $request->input('daily_necessities');
        $budget_month->food = $request->input('food');
        $budget_month->education = $request->input('education');
        $budget_month->entertainment = $request->input('entertainment');
        $budget_month->clothing = $request->input('clothing');
        $budget_month->medical = $request->input('medical');

        $budget_month->save();

        return redirect('budget/index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //詳細画面にて選択している月を削除する
        $budget_month = BudgetForm::find($id);
        $budget_month->delete();

        return redirect('budget/index');

    }
}
