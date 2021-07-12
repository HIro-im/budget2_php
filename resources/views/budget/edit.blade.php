@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    editです
                    <form method="POST" action="{{ route('budget.update', ['id' => $budget_month->id ]) }}">
                    @csrf
                    支出年月<!-- 仮でINT型で取るようにする  -->
                    <input type="month" name="budget_date" value="{{ $budget_month->budget_date }}">
                    <br>
                    日用品
                    <input type="number" name="daily_necessities" value="{{ $budget_month->daily_necessities }}">
                    <br>
                    食費
                    <input type="number" name="food" value="{{ $budget_month->food }}">
                    <br>
                    教養・教育
                    <input type="number" name="education" value="{{ $budget_month->education }}">
                    <br>
                    趣味・娯楽
                    <input type="number" name="entertainment" value="{{ $budget_month->entertainment }}">
                    <br>
                    衣服・美容
                    <input type="number" name="clothing" value="{{ $budget_month->clothing }}">
                    <br>
                    健康・医療
                    <input type="number" name="medical" value="{{ $budget_month->medical }}">
                    <br>
                    <input class="btn btn-info" type="submit" value="更新する">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection