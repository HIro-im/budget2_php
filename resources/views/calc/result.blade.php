@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="GET" action="{{ route('budget.create') }}">
                    <button type="submit" class="btn btn-primary">支出登録</button>
                    </form>

                    <form method="GET" action="{{ route('calc.result') }}">
                    @csrf
                    <!-- 日用品 平均支出額
                    <input type="text" name="daily_necessities" value={{$daily_necessities_avg}} readonly='readonly'>円
                    <br>
                    食費 平均支出額
                    <input type="text" name="food" value={{$food_avg}} readonly='readonly'>円
                    <br>
                    教養・教育 平均支出額
                    <input type="text" name="education" value={{$education_avg}} readonly='readonly'>円
                    <br>
                    趣味・娯楽 平均支出額
                    <input type="text" name="entertainment" value="{{$entertainment_avg}}" readonly='readonly'>円
                    <br>
                    衣服・美容 平均支出額
                    <input type="textbox" name="clothing" value="{{$clothing_avg}}" readonly='readonly'>円
                    <br>
                    健康・医療 平均支出額
                    <input type="textbox" name="medical" value="{{$medical_avg}}" readonly='readonly'>円
                    <br>

                    無収入での生活可能期間
                    <input type="number" name="term" value={{$number_of_months}} readonly='readonly'>ヶ月
                    <br>
                    固定費の合計額
                    <input type="number" name="term" value={{$avg_sum}} readonly='readonly'>円
                    <br> -->
                    <div class="form-group row">
                        <label for="inputDaily_necessities" class="col-sm-2 col-form-label">日用品 平均支出額</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control" name="daily_necessities" id="inputDaily_necessities" value={{$daily_necessities_avg}} readonly='readonly'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputFood" class="col-sm-2 col-form-label">食費 平均支出額</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control" name="food" id="inputFood" value={{$food_avg}} readonly='readonly'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEducation" class="col-sm-2 col-form-label">教養・教育 平均支出額</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control" name="education" id="inputEducation" value={{$education_avg}} readonly='readonly'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEntertainment" class="col-sm-2 col-form-label">趣味・娯楽 平均支出額</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control" name="entertainment" id="inputEntertainment" value={{$entertainment_avg}} readonly='readonly'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputClothing" class="col-sm-2 col-form-label">衣服・美容 平均支出額</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control" name="clothing" id="inputClothing" value={{$clothing_avg}} readonly='readonly'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputMedical" class="col-sm-2 col-form-label">健康・医療 平均支出額</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control" name="medical" id="inputMedical" value={{$medical_avg}} readonly='readonly'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="number_of_months" class="col-sm-2 col-form-label">無収入での生活可能期間</label>
                        <div class="col-sm-2">
                        <input type="text" class="form-control" name="term" id="number_of_months" value={{$number_of_months}} readonly='readonly'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sum_fix" class="col-sm-2 col-form-label">固定費の合計額</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control" name="sum_fix" id="sum_fix" value={{$avg_sum}} readonly='readonly'>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">計算する</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection