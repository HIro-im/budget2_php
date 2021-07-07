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

                    createです
                    <form method="POST" action="{{ route('budget.store') }}">
                    @csrf
                    支出年月<!-- 仮でINT型で取るようにする  -->
                    <input type="month" name="budget_date">
                    <br>
                    日用品
                    <input type="number" name="daily_necessities" value="0">
                    <br>
                    食費
                    <input type="number" name="food" value="0">
                    <br>
                    教養・教育
                    <input type="number" name="education" value="0">
                    <br>
                    趣味・娯楽
                    <input type="number" name="entertainment" value="0">
                    <br>
                    衣服・美容
                    <input type="number" name="clothing" value="0">
                    <br>
                    健康・医療
                    <input type="number" name="medical" value="0">
                    <br>

                    <input class="btn btn-info" type="submit" value="登録する">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection