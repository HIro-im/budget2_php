@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">修正画面</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="GET" action="{{ route('budget.show', ['id' => $budget_month->id ]) }}">
                    <button type="submit" class="btn btn-primary">詳細画面に戻る</button>
                    </form>

                    <form method="POST" action="{{ route('budget.update', ['id' => $budget_month->id ]) }}">
                    @csrf
                    <!-- 支出年月 仮でINT型で取るようにする  -->
                    <!-- <input type="month" name="budget_date" value="{{ $budget_month->budget_date }}">
                    <br>
                    日用品
                    <input type="number" name="daily_necessities" value="{{ $budget_month->daily_necessities }}">円
                    <br>
                    食費
                    <input type="number" name="food" value="{{ $budget_month->food }}">円
                    <br>
                    教養・教育
                    <input type="number" name="education" value="{{ $budget_month->education }}">円
                    <br>
                    趣味・娯楽
                    <input type="number" name="entertainment" value="{{ $budget_month->entertainment }}">円
                    <br>
                    衣服・美容
                    <input type="number" name="clothing" value="{{ $budget_month->clothing }}">円
                    <br>
                    健康・医療
                    <input type="number" name="medical" value="{{ $budget_month->medical }}">円
                    <br> -->

                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $message)
                            <!-- 全てのエラーメッセージを出力 -->
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="form-group row">
                        <label for="inputMonth" class="col-sm-2 col-form-label">支出年月</label>
                        <div class="col-sm-8">
                        <input type="month" class="form-control" id="inputMonth" name="budget_date" value="{{ $budget_month->budget_date }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputDaily_necessities" class="col-sm-2 col-form-label">日用品</label>
                        <div class="col-sm-8">
                        <input type="number" class="form-control" name="daily_necessities" id="inputDaily_necessities" value="{{ $budget_month->daily_necessities }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputFood" class="col-sm-2 col-form-label">食費</label>
                        <div class="col-sm-8">
                        <input type="number" class="form-control" name="food" id="inputFood" value="{{ $budget_month->food }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEducation" class="col-sm-2 col-form-label">教養・教育</label>
                        <div class="col-sm-8">
                        <input type="number" class="form-control" name="education" id="inputEducation" value="{{ $budget_month->education }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEntertainment" class="col-sm-2 col-form-label">趣味・娯楽</label>
                        <div class="col-sm-8">
                        <input type="number" class="form-control" name="entertainment" id="inputEntertainment" value="{{ $budget_month->entertainment }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputClothing" class="col-sm-2 col-form-label">衣服・美容</label>
                        <div class="col-sm-8">
                        <input type="number" class="form-control" name="clothing" id="inputClothing" value="{{ $budget_month->clothing }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputMedical" class="col-sm-2 col-form-label">健康・医療</label>
                        <div class="col-sm-8">
                        <input type="number" class="form-control" name="medical" id="inputMedical" value="{{ $budget_month->medical }}">
                        </div>
                    </div>
                    <input class="btn btn-info" type="submit" value="修正する">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection