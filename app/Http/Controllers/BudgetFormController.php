<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BudgetForm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BudgetFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $budgets = DB::table('budget_forms')
        ->select('budget_date', 'daily_necessities', 'food', 'education', 'entertainment', 'clothing', 'medical')
        ->where('user_id', '=', Auth::id())
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
    public function store(Request $request)
    {
        //

        $budget = new BudgetForm;

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
