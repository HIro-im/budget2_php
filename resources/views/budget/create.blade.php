@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">金額登録画面</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('budget.store') }}">
                    @csrf
                    <!-- 支出年月 仮でINT型で取るようにする  -->
                    <!-- <input type="month" name="budget_date">
                    <br>
                    日用品
                    <input type="number" name="daily_necessities" value="0">円
                    <br>
                    食費
                    <input type="number" name="food" value="0">円
                    <br>
                    教養・教育
                    <input type="number" name="education" value="0">円
                    <br>
                    趣味・娯楽
                    <input type="number" name="entertainment" value="0">円
                    <br>
                    衣服・美容
                    <input type="number" name="clothing" value="0">円
                    <br>
                    健康・医療
                    <input type="number" name="medical" value="0">円
                    <br> --> 

                    <div class="form-group row">
                        <label for="inputMonth" class="col-sm-2 col-form-label">支出年月</label>
                        <div class="col-sm-8">
                        <input type="month" class="form-control" id="inputMonth" name="budget_date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputDaily_necessities" class="col-sm-2 col-form-label">日用品</label>
                        <div class="col-sm-8">
                        <input type="number" class="form-control" name="daily_necessities" id="inputDaily_necessities" value="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputFood" class="col-sm-2 col-form-label">食費</label>
                        <div class="col-sm-8">
                        <input type="number" class="form-control" name="food" id="inputFood" value="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEducation" class="col-sm-2 col-form-label">教養・教育</label>
                        <div class="col-sm-8">
                        <input type="number" class="form-control" name="education" id="inputEducation" value="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEntertainment" class="col-sm-2 col-form-label">趣味・娯楽</label>
                        <div class="col-sm-8">
                        <input type="number" class="form-control" name="entertainment" id="inputEntertainment" value="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputClothing" class="col-sm-2 col-form-label">衣服・美容</label>
                        <div class="col-sm-8">
                        <input type="number" class="form-control" name="clothing" id="inputClothing" value="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputMedical" class="col-sm-2 col-form-label">健康・医療</label>
                        <div class="col-sm-8">
                        <input type="number" class="form-control" name="medical" id="inputMedical" value="0">
                        </div>
                    </div>
                    <input class="btn btn-info" type="submit" value="登録する">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection